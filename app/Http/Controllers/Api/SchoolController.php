<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Image;
use Session;

class SchoolController extends Controller
{
public function register(Request $request){
        $this->validate($request, [
            'school_name' => 'required|min:3|max:32',
            'email' => 'required|email|unique:schools',
            'phone' => 'required',
            'password' => 'required|min:3',
            'password_confirmation' => 'min:6|same:password'
        ]); 
        $memo_no = School::orderBy('id','desc')->withTrashed()->first();
        $school_code = 'SC'. str_pad(($memo_no?$memo_no->id:0) + 1, 6, "0", STR_PAD_LEFT); //"F-".str_pad($dbValue, 7, "0", STR_PAD_LEFT);      
        $data = new School();
        $data->school_name = $request->school_name;
        $data->school_code = $school_code;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        if($request->hasFile('logo')) {
            $image = $request->logo;
            $filename = $image->getClientOriginalName();
            $filename = preg_replace('/\s+/', '-', $filename);
            $folder = 'uploads/'.date('Y').'/'.date('m');
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            $user_img = $folder.'/'. time() . '-' . $filename;
            Image::make($image)->resize(300, 300)->save($user_img);
            $data->logo = secure_asset($user_img);
        }
        $data->password = bcrypt($request->password);
        // $data->verifyToken = Str::random(40);
        $data->status = 1;
        $data->save();
    
        return response()->json(
            [
            "message" => "School Add is successful!",
            "status" => "registered",
            'user' => $data
            ], 201 // error code
        );
    }
    public function login(Request $request){
        $email = $request->email;
        $adminByEmail = School::where(['email'=>$email,'status'=>1])->first();
        if ($adminByEmail == null) {
            return response()->json("The provided credentials are incorrect", 201);
        } else {
            $existingPassword = $adminByEmail->password;
            if (password_verify($request->password, $existingPassword)) {
                Session::put('schoolId', $adminByEmail->id);
                Session::put('schoolName', $adminByEmail->school_name);
                Session::put('schoolEmail', $adminByEmail->email);
                return response()->json([
                    'status' => 'success',
                ], 200);
            } else {
                return response()->json("The provided credentials are incorrect", 201);
            }
        }
    }
}
