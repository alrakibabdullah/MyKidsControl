<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailSetting;
use Illuminate\Http\Request;
use Mail;

class EmailMarketingController extends Controller
{
    public function email_marketing(Request $request){
        $validatedData = $request->validate([
	        'id' => 'required',

	    ],[
	    	'id.required' => 'Select Email First!!',
	    ]);
		$emails = $request->id;
        // $emails = ['didarulislamakand@gmail.com', 'niloyakhandniloy@gmail.com','painlife2017@gmail.com'];
        
            Mail::send('admin.setting.email.send_bulk_email', [], function($message) use ($emails)
            {   
                $data = EmailSetting::first();
                if(!empty($data->subject)){
                    $message->to($emails)->subject($data->subject); 
                }else{
                    $message->to($emails)->subject('This is test Mail'); 
                }
                   
            });
            $notification=array(
                'message' => 'Email Send.Please Check Your Email',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
    }
    public function email_template(){
        $data = EmailSetting::first();
        return view('admin.setting.email.template',compact('data'));
    }
    public function email_details(Request $request){
        $validatedData = $request->validate([
	        'subject' => 'required',
	        'description' => 'required',

	    ]);
        $data = EmailSetting::first();
        if($data){
            $details =EmailSetting::first();
            $details->subject = $request->subject;
            $details->description = $request->description;
            $details->save();
            $notification=array(
                'message' => 'Successfully Updated',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $details =new EmailSetting ();
            $details->subject = $request->subject;
            $details->description = $request->description;
            $details->save();
            $notification=array(
                'message' => 'Successfully save',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        
    }
}
