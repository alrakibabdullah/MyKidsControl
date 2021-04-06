<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

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
        $data->user_type = 'child';
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
    public function parent_login(Request $request){
        $email = $request->email;
        $adminByEmail = Customer::where(['email'=>$email,'status'=>1])->first();
        if ($adminByEmail == null) {
            return response()->json("The provided credentials are incorrect", 201);
        } else {
            $existingPassword = $adminByEmail->password;
            if (password_verify($request->password, $existingPassword)) {
                Session::put('parentId', $adminByEmail->id);
                Session::put('parentName', $adminByEmail->name);
                Session::put('Email', $adminByEmail->email);
                return response()->json([
                    'status' => 'success',
                ], 200);
            } else {
                return response()->json("The provided credentials are incorrect", 201);
            }
        }
    }
    public function child_login(Request $request){
        $email = $request->email;
        $adminByEmail = User::where(['email'=>$email,'status'=>1])->first();
        if ($adminByEmail == null) {
            return response()->json("The provided credentials are incorrect", 201);
        } else {
            $existingPassword = $adminByEmail->password;
            if (password_verify($request->password, $existingPassword)) {
                Session::put('adminId', $adminByEmail->id);
                Session::put('adminName', $adminByEmail->name);
                Session::put('adminEmail', $adminByEmail->email);
                Session::put('adminRole', $adminByEmail->role_id);
                return response()->json([
                    'status' => 'success',
                ], 200);
            } else {
                return response()->json("The provided credentials are incorrect", 201);
            }
        }
    }
    
}
