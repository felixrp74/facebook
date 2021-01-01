<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Bcrypt;


class UserController extends Controller
{
    //
    function register (Request $request) {
        $validador = Validator::make($request->all(), [
                        'name' => 'required',
                        'email' => 'required|email',
                        'password' => 'required',
                    ]);
                    
        if($validador->fails())
        {
            return response()->json(['status_code' => 400, 'message' => 'Mala peticion']);
        }
 
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make( $request->password );
        $user->save();

        return response()->json(['status_code' => 200, 'message' => 'Registrado peticion']);
        
    }

    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
    
        $token = $user->createToken('my-app-token')->plainTextToken;
    
        $response = [
            'user' => $user,
            'token' => $token
        ];
    
        return response($response, 201);
    }

    function logout (Request $request) {
        $request->user()->currentAccessToken()->delete();
        // $request->user()->logout();
        redirect('/');
        return response()->json(['status_code' => 200, 'message' => 'token elimindado']);
    }

    function logingoogle(Request $request){

        
        
        $validador = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email', 
        ]);

        if($validador->fails())
        {
            return response()->json(['status_code' => 400, 'message' => 'Mala peticion']);
        }
 
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email; 
        $user->save();

        return response()->json(['status_code' => 200, 'message' => 'Registrado existoso']);
         
    }
 
      
}
