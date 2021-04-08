<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Image;
use Session;

class ParentControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Session::get('schoolId');
        $customers = Customer::where('school_id',$id)->get();
        return view('school.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.customer.create');
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
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'phone' => 'max:15|required|unique:customers,phone',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);   
        $data =new Customer();
        $data->school_id = Session::get('schoolId');
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
        $data->password = bcrypt($request->password);
        $data->status = $request->status;
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
        $data = Customer::where('id',$id)->first();
        return view('school.customer.edit',compact('data'));
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
        $data->status = $request->status;
        $data->update();
        $notification=array(
            'message' => 'Successfully Saved',
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
