<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\SchoolTransaction;
use Illuminate\Http\Request;
use Session;

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
            'school_code' => 'required',
            'payment_method' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'flat_amount' => 'required_without:percent_amount',
            'percent_amount' => 'required_without:flat_amount',
        ]);
        $school = School::where('school_code',$request->school_code)->first();
        $transaction =new SchoolTransaction ();
        $transaction->school_id = $school->id;
        $transaction->school_code = $request->school_code;
        $transaction->payment_method = $request->payment_method;
        $transaction->start_date = $request->start_date;
        $transaction->end_date = $request->end_date;
        $transaction->flat_amount =$request->flat_amount;
        $transaction->percent_amount =$request->percent_amount;
        $transaction->note = $request->note;
        $transaction->save();
        $notification=array(
            'message' => 'Successfully Saved',
            'alert-type' => 'success'
        );
        Session::forget('school_id');
        Session::forget('school_name');
        Session::forget('school_code');
        Session::forget('payment_method');
        Session::forget('start_date');
        Session::forget('end_date');
        Session::forget('flat_amount');
        Session::forget('percent_amount');
        Session::forget('note');
        return redirect()->route('payment.index');
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
    public function get_school_code(Request $request){
        // if($request->ajax()){
        //     $school = School::where('school_code',$request->school_code)->first();
        //     if($school){
        //         return response()->json([
        //             'school'=>$school,
        //         ]);
        //     }
        // }
        $response = "<span style='color: red;'>'{$request->school_code}' is Invalid!</span>";
        $data = School::where('school_code',$request->school_code)->first();
        if($data){
            return response()->json([
                'data'=>$data,
            ]);
        }
    }
    public function payment_preview(Request $request){
        $this->validate($request, [
            'school_code' => 'required',
            'payment_method' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'flat_amount' => 'required_without:percent_amount',
            'percent_amount' => 'required_without:flat_amount',
        ]);
        $school = School::where('school_code',$request->school_code)->first();
        Session::put('school_id', $school->id);
        Session::put('school_name', $request->school_name);
        Session::put('school_code', $request->school_code);
        Session::put('payment_method', $request->payment_method);
        Session::put('start_date',$request->start_date);
        Session::put('end_date',$request->end_date);
        Session::put('flat_amount',$request->flat_amount);
        Session::put('percent_amount',$request->percent_amount);
        Session::put('note',$request->note);
        return view('admin.school.payment.payment_preview');
    }
}
