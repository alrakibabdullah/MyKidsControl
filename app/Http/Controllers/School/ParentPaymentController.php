<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\ParentTransaction;
use Illuminate\Http\Request;

class ParentPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parent_payment = ParentTransaction::get();
        return view('school.customer.payment.index',compact('parent_payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Customer::where('status',1)->get();
        return view('school.customer.payment.create',compact('parents'));
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
            'parent_id' => 'required',
            'payment_method' => 'required',
            'date' => 'required',
            'amount' => 'required',
        ]);
        $transaction =new ParentTransaction ();
        $transaction->parent_id = $request->parent_id;
        $transaction->payment_method = $request->payment_method;
        $transaction->date = $request->date;
        $transaction->old_balance = 0;
        $transaction->credit =$request->amount;
        $transaction->debit =0;
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
