<?php

namespace App\Http\Controllers;

use App\User;
use App\Vistor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;


class VistorController extends Controller
{

    public function  login(){
        if(Auth::attempt(['email'=> request('email'),'password'=>request('password')])){

            $vistor=Auth::user();


            $success['token'] =  $vistor->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }

    }

    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=> 'required',
            'first_name'=> 'required',
            'last_name'=> 'required',
            'password' =>'required',
            'c_password' =>'required|same:password'
        ]);

        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()],401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;

        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], 200);

    }
}
