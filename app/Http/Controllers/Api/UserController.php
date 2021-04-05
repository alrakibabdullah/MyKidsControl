<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3|max:32',
            'email' => 'required|email|unique:users',
            'phone' => 'required|phone|unique:users',
            'password' => 'required|min:3',
            'password_confirmation' => 'min:6|same:password'
        ]);       
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->user_type = $request->user_type;
        $data->password = bcrypt($request->password);
        // $data->verifyToken = Str::random(40);
        $data->status = 1;
        $data->save();
    
        return response()->json(
            [
            "message" => "User registration is successful!",
            "status" => "registered",
            'user' => $data
            ], 201 // error code
        );
    }
    
}
