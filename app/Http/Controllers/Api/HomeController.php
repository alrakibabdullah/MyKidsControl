<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\AppCategory;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Schedule;
use App\Models\SiteImage;
use App\Models\Website;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function website(){
        $websites = Website::orderBy('id','desc')->get();

        return response()->json([
            'websites'=>$websites,
        ]);
    }
    public function save_website(Request $request){
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'link' => 'required',
        ]); 
        $data = new Website();
        $data->category_id = $request->category_id;
        $data->name = $request->name;
        $data->link = $request->link;
        $image = $request->file('logo');
        if($image)
        {
            $image_name= $image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'images/websites/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {
                $data->logo = $image_url;
            }
        }
        $data->save();
        return response()->json(
            [
            "message" => "Website saved is successful!",
            "status" => "successful",
            'user' => $data
            ], 201 // error code
        );
    }
    public function apps(){
        $apps = App::orderBy('id','desc')->get();

        return response()->json([
            'apps'=>$apps,
        ]);
    }
    public function save_apps(Request $request){
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'link' => 'required',
        ]); 
        $data = new App();
        $data->category_id = $request->category_id;
        $data->name = $request->name;
        $data->link = $request->link;
        $image = $request->file('logo');
        if($image)
        {
            $image_name= $image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'images/apps/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {
                $data->logo = $image_url;
            }
        }
        $data->save();
        return response()->json(
            [
            "message" => "Apps saved is successful!",
            "status" => "successful",
            'user' => $data
            ], 201 // error code
        );
    }
    public function customers(){
        $customers = Customer::orderBy('id','desc')->where('status',1)->get();

        return response()->json([
            'customers'=>$customers,
        ]);
    }
    public function countries(){
        $countries = Country::orderBy('id','desc')->get();

        return response()->json([
            'countries'=>$countries,
        ]);
    }
    public function logo(){
        $logo = SiteImage::first();

        return response()->json([
            'logo'=>$logo,
        ]);
    }
    
    public function save_schedule(Request $request){
        $this->validate($request, [
            'user_id' => 'required',
            'title' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
            'saturday' => 'required',
            'sunday' => 'required',
            'monday' => 'required',
            'tuesday' => 'required',
            'wednesday' => 'required',
            'thursday' => 'required',
            'friday' => 'required',
        ]); 
        $data = new Schedule();
        $data->user_id = $request->user_id;
        $data->title = $request->title;
        $data->from_time = $request->from_time;
        $data->to_time = $request->to_time;
        $data->saturday = $request->saturday;
        $data->sunday = $request->sunday;
        $data->monday = $request->monday;
        $data->tuesday = $request->tuesday;
        $data->wednesday = $request->wednesday;
        $data->thursday = $request->thursday;
        $data->friday = $request->friday;
        $data->save();
        return response()->json(
            [
            "message" => "Schedule saved is successful!",
            "status" => "registered",
            'user' => $data
            ], 201 // error code
        );
    }
    public function contact(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'description' => 'required',
        ]); 
        $data = new Contact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->description = $request->description;
        $data->save();
        return response()->json(
            [
            "message" => "Message send successful!",
            "status" => "successfully send message.",
            'user' => $data
            ], 201 // error code
        );
    }
    public function app_category(){
        $app_categories = AppCategory::where('type',0)->get();

        return response()->json([
            'app_categories'=>$app_categories,
        ]);
    }
    public function web_category(){
        $web_categories = AppCategory::where('type',1)->get();

        return response()->json([
            'web_categories'=>$web_categories,
        ]);
    }
}
