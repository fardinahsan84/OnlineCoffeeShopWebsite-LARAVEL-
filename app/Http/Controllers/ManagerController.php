<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\editProductRequest;
use App\Http\Requests\editProfileRequest;

use App\User;
use App\Foods;
use Validator;
use PDF;

class ManagerController extends Controller
{

    function index(Request $req){
      $username = $req->session()->get('username');
      $user = User::where('username',$username)->first();
      //$user = User::all();        //$user = DB::table('users')->find();
		  return view('mhome.index')->with('manager', $user);
    }

    //All Coffee List
    function allFood(Request $req){
        return view('mhome.allFood') ;
    }
    //search Foods
    function FoodSearch(Request $request){
         if($request->ajax())
         {
          $output = '';
          $query = $request->get('query');
          if($query != '')
          {
           $data = DB::table('foods')
             ->where('id', 'like', '%'.$query.'%')
             ->orWhere('name', 'like', '%'.$query.'%')
             ->orWhere('status', 'like', '%'.$query.'%')
             ->get();
          }
          else
          {
           $data = DB::table('foods')
             ->get();
          }
          $action="Edit";
          $total_row = $data->count();
          if($total_row > 0)
          {

           foreach($data as $row)
           {
            // $output .= '
            //  <td><a href="editFood/'.$row->c_id.'" style="color:white;">'.$action.'</a></td>
            // ';
            $output .= '
            <fieldset >
                  <legend class="rounded-top"><h4>'.$row->name.'</h4></legend>
                  <tr>
                    <th>ID</th><td>'.$row->id.'</td>
                  </tr>
                  <tr>
                    <th>NAME</th><td>'.$row->name.'</td><td><a href="/manager/editFood/'.$row->id.'" class="btn btn-secondary btn-xs"> Edit </a></td>
                  </tr>
                  <tr>
                    <th>Price/item</th><td>'.$row->price.'</td><td><a href="/manager/deleteFood/'.$row->id.'" class="btn btn-secondary btn-xs">Delete</a></td>
                  </tr
                  <tr>
                    <th>Suggested</th><td>'.$row->suggested.'</td><td><a href="/manager/suggestFood/'.$row->id.'" class="btn btn-secondary btn-xs">Suggest</a></td>
                  <tr>
                    <th>Ingredients</th><td>'.$row->ingredients.'</td><td><a href="/manager/ingredients/'.$row->id.'" class="btn btn-secondary btn-xs">Edit Ingredients</a></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td><h3><a href="/manager/reviews/'.$row->id.'" class="btn btn-secondary">Reviews</a></h3></td>
                </tr>
                </fieldset>
          ';
           }
          }
          else
          {
           $output = '
           <tr>
            <td align="center" colspan="5">No Data Found</td>
           </tr>
           ';
          }
          $data = array(
           'table_data'  => $output,
           'total_data'  => $total_row
          );

          echo json_encode($data);
         }
    }


    //Edit Manager Profile
    function editProfile($id){
        $user = User::where('id',$id)->first();
        return view('manager.edit')->with('manager', $user);
    }
    function updateProfile($id, editProfileRequest $req){

      if($req->hasFile('uploaded_image')){
          $file = $req->file('uploaded_image');
          $name=$file->getClientOriginalName();
          if($file->move('images/upload_images', $file->getClientOriginalName())){

            $update=DB::table('users')
                        ->where('id',$id)
                        ->update(['password'=>$req->password,'email'=>$req->email,'phone'=>$req->phone,'address'=>$req->address,'image'=>$name]);
            return redirect()->route('manager.index');
          }
          else{
            return redirect()->route('manager.editProfile');
          }
      }else{
           return redirect()->route('manager.editProfile');
      }
    }

    //insert a new item
    function add(){

        return view('mhome.add');

    }
    function insert(AddProductRequest $req){

          $food 			  = new Foods;
      		$food->name 	= $req->name;
      		$food->price = $req->price;
      		$food->ingredients 	= $req->ingredients;
      		$food->status 	= $req->status;
          $food->suggested="yes";

      		if($food->save()){
      			   return redirect()->route('manager.allFood');
      		}else{
      			   return redirect()->route('manager.editProfile');
      		}

    }
    //NEW ARRIVAL Foods

    function newArrival(Request $req){

          $food = Foods::all();
          return view('mhome.newArrival')->with('foodList', $food);
    }

    //Edit food item
    function editFood($id){
      $food = Foods::where('id',$id)->first();
      return view('mhome.editFood')->with('food', $food);
    }
    function updateFood($id,editProductRequest $req){
      $food = Foods::find($id);
      $food->price         = $req->price;
      $food->status        = $req->status;
      $food->ingredients   = $req->ingredients;
          if($food->save()){
            return redirect()->route('manager.allFood');
      		}else{
      			   return redirect()->route('manager.newArrival');
             }

    }
    //Delete food
    function deleteFood($id){

      $food = Foods::where('id',$id)->first();
       return view('mhome.deleteFood')->with('food', $food);

    }
    function destroyFood($id, Request $request){

      if(Foods::destroy($id)){
          return redirect()->route('manager.allFood');
      }else{
          return redirect()->route('manager.deleteFood', $id);
      }
    }
    //suggest food
    function suggestFood($id){
      $food = Foods::where('id',$id)->first();
       return view('mhome.suggestFood')->with('food', $food);
    }
    function suggested($id,Request $req){
      $food = Foods::find($id);
      $food->suggested         = $req->suggested;
          if($food->save()){
            return redirect()->route('manager.allFood');
      		}else{
      			   return redirect()->route('manager.suggestFood',$id);
             }

    }

    //Change Status food
    function statusFood($id){
      $food = Foods::where('id',$id)->first();
       return view('mhome.statusFood')->with('food', $food);
    }
    function status($id,Request $req){
      $food = Foods::find($id);
      $food->status         = $req->status;
          if($food->save()){
            return redirect()->route('manager.allFood');
      		}else{
      			   return redirect()->route('manager.statusFood',$id);
             }

    }

    //Change Ingredients
    function ingredientsFood($id){
      $food = Foods::where('id',$id)->first();
       return view('mhome.ingredients')->with('food', $food);
    }
    function ingredients($id,Request $request){


      $food = Foods::find($id);
      $food->ingredients         = $request->ingredients;
          if($food->save()){
            return redirect()->route('manager.allFood');
      		}else{
      			   return redirect()->route('manager.ingredients',$id);
             }

    }

    //Reviews
    function reviews($id){
      $food = Foods::where('id',$id)->first();
      $comment = DB::table('comments')
                        ->join('customers', 'comments.customer_name', '=', 'customers.username')
                        ->join('foods', function($join) use($id){
                              $join->on('comments.food_id', '=', 'foods.id')
                                  ->where('foods.id','=',$id);
                            })
                        ->get();
                        $review = json_decode(json_encode($comment), true);
                        return view('mHome.reviews')->with('review', $review)->with('food',$food);
    }

    //report
    function report(Request $req){
      //$orders = ::where('id',$id)->first();
      $report = DB::table('orders')
                        ->join('foods', 'orders.id', '=', 'foods.id')
                        ->select('orders.*','foods.name')
                        ->get();

                        return view('mHome.report')->with('report', $report);
    }
    //pdf download
    function pdfview(){
      $repor = DB::table('orders')
                        ->join('foods', 'orders.id', '=', 'foods.id')
                        ->select('orders.*','foods.name')
                        ->get();
                        view()->share('report',$repor);

            $pdf = PDF::loadView('mHome.pdf',$repor);
            return $pdf->download('pdfview.pdf');

    }
    //All delivery man
    function allDeliveryMan(Request $req){

                return view('mhome.allDeliveryMan');

    }
    function DeliverySearch(Request $request){
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('customers')
         ->where('c_id', 'like', '%'.$query.'%')
         ->orWhere('username', 'like', '%'.$query.'%')
         ->orWhere('address', 'like', '%'.$query.'%')
         ->orWhere('name', 'like', '%'.$query.'%')
         ->get();
      }
      else
      {
       $data = DB::table('customers')
         ->get();
      }
      $action="Edit";
      $total_row = $data->count();
      if($total_row > 0)
      {

       foreach($data as $row)
       {
        // $output .= '
        //  <td><a href="editFood/'.$row->c_id.'" style="color:white;">'.$action.'</a></td>
        // ';
        $output .= '
        <br>
          <fieldset>
              <legend><h4>'.$row->name.'</h4></legend>
              <tr>
                <th>ID</th><td>'.$row->c_id.'</td>
              </tr>
              <tr>
                <th>NAME</th><td>'.$row->name.'</td>
              </tr>
              <tr>
                <th>Phone</th><td>'.$row->phone.'</td>
              </tr
              <tr>
                <th>Address</th><td>'.$row->address.'</td>
              <tr>
                <th>Email</th><td>'.$row->email.'</td>
              </tr>
                <th>Gender</th><td>'.$row->gender.'</td>
              </tr>
        </fieldset>
      ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
    function DeliveryPdfview(){
      $repor = DB::table('customers')->get();

                        view()->share('dlist',$repor);

            $pdf = PDF::loadView('mHome.deliveryPdf',$repor);
            return $pdf->download('AllDeliveryMan.pdf');

    }
}
