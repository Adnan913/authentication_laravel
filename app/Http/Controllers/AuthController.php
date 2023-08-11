<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function createUser(Request $request)
    {
        $validateUser = Validator::make($request->all(),
        [
            'name'     =>'required',
            'email'    =>'required|email|unique:users,email',
            'password' =>'required',
        ]);
        if($validateUser->fails()){
            return response()->json([
                'status'  => false,
                'message' => 'validation error',
                'errors'  => $validateUser->errors()
            ],401);
        }

        $user = User::create([
            'name'=>$request->name,
            'email' => $request->email,
            'password'=> Hash::make($request->password)
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'User created successfully',
            'token'  => $user->createToken('API TOKEN')->plainTextToken
        ],201);
    }

     /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function loginUser(Request $request)
    {
        try{
            $validateUser = Validator::make($request->all(),
            [
                'email'    => 'required|email',
                'password' => 'required'
            ]);
            if($validateUser->fails()){
                return response()->json([
                    'status'  => false,
                    'message' => 'validation error',
                    'errors'  => $validateUser->errors()
                ],401);            
            }

            $credentials = $request->only('email', 'password');
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'status'  => false,
                    'message' => 'email and pass error',
                    'errors'  => $validateUser->errors()
                ],401); 
            }
            $user = User::where('email',$request->email)->first();

            return response()->json([
                'status'  => true,
                'message' => 'User login successfully',
                'token'  => $user->createToken('API TOKEN')->plainTextToken
            ],200);

        }
        catch(\Throwable $th){
            return response()->json([
                'status'  => false,
                'message' => $th->getMessage()
            ],500); 
        }
    }

    public function logoutUser(Request $request){
        // Session::flush();
        // Auth::logout();
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status'  => true,
            'message' => 'User logout successfully',
        ],200);
    }
}
