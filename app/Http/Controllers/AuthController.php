<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
      public function memberRegistration(Request $request){

            $validator = Validator::make($request->all(), [
                'name'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required|string|confirmed|min:6',
                'role'=>'required',
                'profile_image'=>'nullable'
            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Registration failed',
                    'errors'=>$validator->errors()
                ],400);
            }

            $profile_image = null;

            if($request->hasFile('profile_image')){
                $file = $request->file('profile_image');
                $profile_image = time().$file->getClientOriginalName();
                $file->move(public_path('profile_images'),$profile_image);
            }

            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'role'=>$request->role,
                'profile_image'=>$profile_image
            ]);
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status'=>true,
                'message'=>'Registration successful',
                'data'=> new UserResource($user),
                'token'=>$token
                ],200);
      }

      public function getUser(Request $request){
         $user = User::findOrFAil($request->user()->id);
          return response()->json([
              'status'=>true,
              'message'=>'User fetched successfully',
              'data'=> $user
          ],200);
      }

      public function login(Request $request){

            $validator = Validator::make($request->all(),[
                'email'=>'required|email',
                'password'=>'required|string'
            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Login failed',
                    'errors'=>$validator->errors()
                ],400);
            }
            else{
                $user = User::where('email',$request->email)->first();

                if($user && Hash::check($request->password, $user->password)){
                    $token = $user->createToken('auth_token')->plainTextToken;
                    return response()->json([
                        'status'=>true,
                        'message'=>"Login Successful",
                        'data'=>new UserResource($user),
                        'token'=>$token
                    
                    ],200);
                }
                else{
                    return response()->json([
                        'status'=>false,
                        'message'=>'Login failed. Invalid credentials'
                    ],401);
                }
            }

            
      }

      public function logout(Request $request){
          $request->user()->currentAccessToken()->delete();
            return response()->json([
                'status'=>true,
                'message'=>'Logout successful'
            ],200);
      }
}
