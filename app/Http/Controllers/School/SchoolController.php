<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\SchoolTransaction;
use Illuminate\Http\Request;
use Session;
use Hash;

class SchoolController extends Controller
{
    public function login(){
        return view('school.auth.login');
    }
    public function save_login(Request $request){
        $email = $request->email;
        $schoolByEmail = School::where(['email'=>$email,'status'=>1])->first();
        if ($schoolByEmail == null) {
            $notification=array(
                'message' => 'Email or Password is not Valid',
                'alert-type' => 'success'
            );
            return redirect()->back()->with('message', 'Email or Password is not Valid');
        } else {
            $existingPassword = $schoolByEmail->password;
//    return $existingPassword;
            if (password_verify($request->password, $existingPassword)) {
                Session::put('schoolId', $schoolByEmail->id);
                Session::put('schoolName', $schoolByEmail->school_name);
                Session::put('schoolEmail', $schoolByEmail->email);
                return redirect('/school/dashboard');
            } else {
                $notification=array(
                    'message' => 'Email or Password is not Valid',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }
    public function home(){
        return view('school.home');
    }
    public function logout(){
        Session::forget('schoolId');
        Session::forget('schoolName');
        Session::forget('schoolEmail');
        return redirect('/school/login');
    }
    public function change_password(){
        return view('school.auth.change_pass');
    }
    public function save_password(Request $request){
        $id = Session::get('schoolId');
        if($request->old_password){
            
            $this->validate($request, [
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'
            ]);
            $user = School::where('id',$id)->first();
            if (!(Hash::check($request->get('old_password'), $user->password))) {
                $notification=array(
                    'message' => 'Your current password does not matches with the password you provided. Please try again.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
                // The passwords matches
            }
            $user->password = bcrypt($request->password);
            $user->save();
            $notification=array(
                'message' => 'Password Successfully Changed',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function payment_history(){
        $school_payment = SchoolTransaction::where('school_id',Session::get('schoolId'))->get();
        return view('school.report.payment_history',compact('school_payment'));
    }
    public function profile(){
        $id = Session::get('schoolId');
        $user_by_id = School::where('id',$id)->first();
        return view('school.auth.profile',compact('user_by_id'));
    }
    public function save_profile(Request $request){
        $this->validate($request, [
            'school_name' => 'required',
        ]);
        $id = Session::get('schoolId');
        $data =School::find($id);
        $data->school_name = $request->school_name;
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
        $data->save();
        $notification=array(
            'message' => 'Successfully Saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
