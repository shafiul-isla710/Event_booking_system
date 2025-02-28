<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
      /**
      * get all users
      */
      public function getUsers(Request $request){
            $users= User::all();
            return response()->json(['massage'=>"success",'data'=>$users]);
      }


      /**
      * get single user
      */
      public function getUser(Request $request){
            $user= User::with('Booking')->findOrFail($request->id);
            return response()->json(['massage'=>"success",'data'=>$user]);
      }

       /**
      * create user
      */
      public function createUser(Request $request){
           
               $request->validate([
                  'role'=>'required',
                  'name'=>'required|min:4',
                  'email'=>'required|email|unique:users',
                  'password'=>'required|min:4|max:10',
                  'profile_image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
              ]);
              User::create($request->all());

              return response()->json(['massage'=>"user Create Successfully"]);
      }


      /**
      * update user
      */
      public function updateUser(Request $request){
            $request->validate([
                  'role'=>'required',
                  'name'=>'required|min:4',
                  'email'=>'required|email|unique:users,email,'.$request->id,
                  'password'=>'required|min:4|max:10',
                  'profile_image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
              ]);

             $update = User::findOrFail($request->id)->update($request->all());
              return response()->json(['status'=>'success','massage'=>"user Update Successfully" , 'data'=>$update]);
      }
      /**
      * Delete user by id
      */
      public function destroyUser(Request $request){

             User::findOrFail($request->id)->delete();
              return response()->json(['status'=>'success','massage'=>"user Delete Successfully" , ]);
      }
}
