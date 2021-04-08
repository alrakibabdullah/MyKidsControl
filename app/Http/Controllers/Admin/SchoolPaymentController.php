<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\SchoolTransaction;
use Illuminate\Http\Request;

class SchoolPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school_payment = SchoolTransaction::get();
        return view('admin.school.payment.index',compact('school_payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = School::where('status',1)->get();
        return view('admin.school.payment.create',compact('school'));
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
            'school_id' => 'required',
            'payment_method' => 'required',
            'date' => 'required',
            'amount' => 'required',
        ]);
        $transaction =new SchoolTransaction ();
        $transaction->school_id = $request->school_id;
        $transaction->payment_method = $request->payment_method;
        $transaction->date = $request->date;
        $transaction->old_balance = 0;
        $transaction->credit =0;
        $transaction->debit =$request->amount;
        $transaction->note = $request->note;
        $transaction->balance =0;
        $transaction->save();
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
}
