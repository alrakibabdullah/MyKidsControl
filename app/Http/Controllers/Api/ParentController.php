<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class ParentController extends Controller
{
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
                Session::put('parentEmail', $adminByEmail->email);
                return response()->json([
                    'status' => 'success',
                ], 200);
            } else {
                return response()->json("The provided credentials are incorrect", 201);
            }
        }
    }
    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3|max:32',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'school_id' => 'required',
            'password' => 'required|min:3',
            'password_confirmation' => 'min:6|same:password'
        ]);       
        $data = new Customer();
        $data->name = $request->name;
        $data->school_id = $request->school_id;
        $data->code = $request->code;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->password = bcrypt($request->password);
        // $data->verifyToken = Str::random(40);
        $data->status = 1;
        $data->save();
    
        return response()->json(
            [
            "message" => "Parent registration is successful!",
            "status" => "registered",
            'user' => $data
            ], 201 // error code
        );
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
        ]);   
        $data =Customer::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        if($request->hasFile('image')) {
            $image = $request->image;
            $filename = $image->getClientOriginalName();
            $filename = preg_replace('/\s+/', '-', $filename);
            $folder = 'uploads/'.date('Y').'/'.date('m');
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            $user_img = $folder.'/'. time() . '-' . $filename;
            Image::make($image)->resize(300, 300)->save($user_img);
            $data->image = secure_asset($user_img);
        }
        $data->update();
        return response()->json(
            [
            "message" => "update is successful!",
            "status" => "updated",
            'user' => $data
            ], 201 // error code
        );
    }
}
