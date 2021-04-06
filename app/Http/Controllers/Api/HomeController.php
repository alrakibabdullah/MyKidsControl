<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Customer;
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
    public function customers(){
        $customers = Customer::orderBy('id','desc')->get();

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
}
