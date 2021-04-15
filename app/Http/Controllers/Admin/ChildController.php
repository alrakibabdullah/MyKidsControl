<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\Customer;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $child = User::where('status',1)->get();
        return view('admin.child.index',compact('child'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = User::find($id);
        return view('admin.child.edit',compact('data'));
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
            'phone' => 'required',
        ]);   
        $data =User::find($id);
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
    public function parent(Request $request){
        if($request->ajax()){
            $main_data = User::find($request->id);
            $parent = Customer::where('id',$main_data->parent_id)->first();
            return view('admin.child.parent_view',compact('main_data','parent'));
        }
    }
    public function children_list($id){
        $child_list = User::where('parent_id',$id)->get();
        return view('admin.customer.children_list',compact('child_list'));
    }
    public function child(Request $request){
        if($request->ajax()){
            $main_data = User::find($request->id);
            return view('admin.customer.child_profile',compact('main_data'));
        }
    }
    public function inactive_user(){
        $customers = Customer::all();
        return view('admin.setting.inactive_user',compact('customers'));
    }
    public function child_schedule($id){
        $schedule = Schedule::where('user_id',$id)->get();
        return view('admin.child.schedule',compact('schedule'));
    }
}
