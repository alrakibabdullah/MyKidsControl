<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Discount;
use App\Models\School;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::all();
        $school = School::where('status',1)->get();
        return view('admin.discount.index',compact('discounts','school'));
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
        $validatedData = $request->validate([
            'title' => 'required',
            'flat_amount' => 'required_without:percent_amount',
            'percent_amount' => 'required_without:flat_amount',
            'school_id' => 'required',
        ]);
        $data = new Discount();
        $data->school_id=$request->school_id;
        $data->title=$request->title;
        $data->flat_amount=$request->flat_amount;
        $data->percent_amount=$request->percent_amount;
        $data->save();
        $notification=array(
            'message' => 'Successfully Done',
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
        $data = Discount::find($id);
        $school = School::where('status',1)->get();
        return view('admin.discount.edit',compact('data','school'));
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
        $validatedData = $request->validate([
            'title' => 'required',
            'flat_amount' => 'required_without:percent_amount',
            'percent_amount' => 'required_without:flat_amount',
            'school_id' => 'required',
        ]);
        $data = Discount::find($id);
        $data->school_id=$request->school_id;
        $data->title=$request->title;
        $data->flat_amount=$request->flat_amount;
        $data->percent_amount=$request->percent_amount;
        $data->save();
        $notification=array(
            'message' => 'Successfully Done',
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
