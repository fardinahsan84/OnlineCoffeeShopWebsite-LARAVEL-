<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\editProductRequest;


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

      $username = $req->session()->get('username');
      $food = Foods::all();
      //$user = User::all();
      //$users = $this->getStudentList();
      //$user = DB::table('users')->find();
        return view('mhome.allFood')->with('foodList', $food);
    }

    //Edit Manager Profile
    function editProfile($id){
        $user = User::where('id',$id)->first();
        return view('manager.edit')->with('manager', $user);
    }
    function updateProfile($id, Request $req){

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

    //All delivery man
    function allDeliveryMan(Request $req){
            $type='delivery';
            $users = DB::table('users')
                        ->where('usertype',$type)
                        ->get();
            $DMan = json_decode(json_encode($users), true);
            if(count($DMan) > 0){
                return view('mhome.allDeliveryMan')->with('DList', $DMan);
            }else{
                return redirect()->route('manager.index');
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
    function ingredients($id,Request $req){
      $food = Foods::find($id);
      $food->ingredients         = $req->ingredients;
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

    function pdfview()
    {
      $repor = DB::table('orders')
                        ->join('foods', 'orders.id', '=', 'foods.id')
                        ->select('orders.*','foods.name')
                        ->get();
                        view()->share('report',$repor);

            $pdf = PDF::loadView('mHome.pdf',$repor);
            return $pdf->download('pdfview.pdf');

    }
}
