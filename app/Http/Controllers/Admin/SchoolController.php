<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Image;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school =  School::get();
        return view('admin.school.index',compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'school_name' => 'required',
            'email' => 'email',
            'phone' => 'max:15|required|unique:schools,phone',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        $code = School::orderBy('id','desc')->withTrashed()->first();
        $data =new School();
        $data->school_code = 'SC'. str_pad(($code?$code->id:0) + 1, 5, "0", STR_PAD_LEFT); //"F-".str_pad($dbValue, 7, "0", STR_PAD_LEFT);  
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
        $data->status = $request->status;
        $data->password = bcrypt($request->password);
        $data->save();
        $notification=array(
            'message' => 'Successfully Saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = School::find($id);
        return view('admin.school.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'school_name' => 'required',
            'email' => 'email',
        ]);   
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
        $data->status = $request->status;
        $data->save();
        $notification=array(
            'message' => 'Successfully Update',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
