<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteImage;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    public function setting(){
        $imge = SiteImage::first();
        return view('admin.setting.site_setting',compact('imge'));
    }
    public function save_logo(Request $request){
        $logo = SiteImage::find($request->img_id);
        if($logo){
            $data = SiteImage::find($request->img_id);
            if($request->hasFile('logo')) {
                $image = $request->logo;
                $filename = $image->getClientOriginalName();
                $filename = preg_replace('/\s+/', '-', $filename);
                $folder = 'uploads/'.date('Y').'/'.date('m');
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $logo_img = $folder.'/'. time() . '-' . $filename;
                Image::make($image)->save($logo_img);
                $data->logo = asset($logo_img);
            }
            $data->save();
        }else{
            $data =new SiteImage();
            if($request->hasFile('logo')) {
                $image = $request->logo;
                $filename = $image->getClientOriginalName();
                $filename = preg_replace('/\s+/', '-', $filename);
                $folder = 'uploads/'.date('Y').'/'.date('m');
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $logo_img = $folder.'/'. time() . '-' . $filename;
                Image::make($image)->save($logo_img);
                $data->logo = asset($logo_img);
            }
            $data->save();
        }
        
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function save_favicon(Request $request){
        $favicon = SiteImage::find($request->fav_id);
        if($favicon){
            $fav_data = SiteImage::find($request->fav_id);
            if($request->hasFile('fav_icon')) {
                $image = $request->fav_icon;
                $filename = $image->getClientOriginalName();
                $filename = preg_replace('/\s+/', '-', $filename);
                $folder = 'uploads/'.date('Y').'/'.date('m');
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $fav_icon = $folder.'/'. time() . '-' . $filename;
                Image::make($image)->resize(32, 32)->save($fav_icon);
                $fav_data->favicon = asset($fav_icon);
            }
            $fav_data->save();
        }else{
            $fav_data = new SiteImage();
            if($request->hasFile('fav_icon')) {
                $image = $request->fav_icon;
                $filename = $image->getClientOriginalName();
                $filename = preg_replace('/\s+/', '-', $filename);
                $folder = 'uploads/'.date('Y').'/'.date('m');
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $fav_icon = $folder.'/'. time() . '-' . $filename;
                Image::make($image)->resize(32, 32)->save($fav_icon);
                $fav_data->favicon = asset($fav_icon);
            }
            $fav_data->save();
        }
        
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
