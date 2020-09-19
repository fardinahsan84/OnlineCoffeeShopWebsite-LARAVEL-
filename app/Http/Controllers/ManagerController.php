<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddProductRequest;

use App\User;
use App\Foods;
use Validator;

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

    function edit($id){

    	$users = $this->getStudentList();

    	//find one student by ID from array
      for ($i=0; $i < count($users) ; $i++) {
        // code...
        if($users[$i]['id']==$id){
          $user = $users[$i];
          return view('mhome.edit')->with('user', $user);
        }
        else{
          continue;
        }
      }
    }

    function update($id, Request $request){

    	$newUser = ['id'=>$id, 'name'=>$request->name,'email'=>$request->email, 'password'=>$request->password];

    	$users = $this->getStudentList();
    	//find one student by ID from array $& replace it's value
		//updated list
    for ($i=0; $i < count($users) ; $i++) {
      // code...
      if($users[$i]['id']==$id){
        //$user = $users[$i];
        $users[$i]=$newUser;
        //print_r($newUser);
        //print_r($users);
        //return view('home.index')->with('users', $users);
        break;
      }
      else{
        continue;
      }
    }

    	return view('mhome.index')->with('users', $users);

    }




    function delete($id){

    	$users = $this->getStudentList();
    	//show comfirm view
      for ($i=0; $i < count($users) ; $i++) {
        // code...
        if($users[$i]['id']==$id){
          $user = $users[$i];
          return view('mhome.delete')->with('user', $user);
        }
        else{
          continue;
        }
      }

    	//return view('home.delete')->with('user', $user);

    }

    function destroy($id, Request $request){

    	$users = $this->getStudentList();
    	//find student by id & delete
            for ($i=0; $i < count($users) ; $i++) {
              // code...
              if($users[$i]['id']==$id){
                unset($users[$i]);
                //print_r($users);
                break;
                //return view('home.index')->with('users', $user);
              }
              else{
                continue;
              }
            }
    	return view('mhome.index')->with('users', $users);
    }


    function getStudentList(){
      $users = DB::table('users')->get();
      return view('Admin.student', ['students' => $users]);
    }
}
