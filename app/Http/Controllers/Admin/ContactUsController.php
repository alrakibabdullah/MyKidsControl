<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contact(){
        $contacts = Contact::orderBy('id','desc')->get();
        return view('admin.contact.manage',compact('contacts'));
    }
    public function edit_contact($id){
        $data = Contact::find($id);
        return view('admin.contact.edit',compact('data'));
    }
    public function delete_contact($id){
       $data = Contact::find($id);
       $data->delete();
       $notification=array(
        'message' => 'Successfully Delete',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
    }
    public function update_contact(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'description' => 'required',
        ]);
        $data = Contact::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->description = $request->description;
        $data->update();
        $notification=array(
            'message' => 'Successfully Update',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
