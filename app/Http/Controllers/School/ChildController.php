<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $child = User::where('status',1)->where('school_id',Session::get('schoolId'))->get();
        return view('school.child.index',compact('child'));
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
        //
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
        //
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
    public function child_schedule($id){
        $schedule = Schedule::where('user_id',$id)->get();
        return view('school.child.schedule',compact('schedule'));
    }
    public function parent(Request $request){
        if($request->ajax()){
            $main_data = User::find($request->id);
            $parent = Customer::where('id',$main_data->parent_id)->first();
            return view('admin.child.parent_view',compact('main_data','parent'));
        }
    }
}
