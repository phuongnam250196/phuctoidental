<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\settings;
use App\seos;
use App\sliders;
use Validator;
class SettingsController extends Controller
{
    public function getSetting() {
    	$setting = settings::first();
        $seo = seos::where('type', 'admin')->first();
    	// dd($setting);
    	return view('backend.setting.index', compact('setting', 'seo'));
    }

    public function postSeoIndexSetting(Request $request) {
        $data = seos::where('type', 'admin')->first();
        if(!empty($data)) {
            $data->site_title = $request->site_title;
            $data->title = $request->title;
            $data->site_name = $request->site_name;
            $data->keyword = $request->keyword;
            $data->author = $request->author;
            $data->url = $request->url;
            $data->description = $request->description;
            if(!empty($request->image) && $request->image != "undefined"){
                $file =  $request->image;
                $path = 'uploads/image/';
                $modifiedFileName = time().'-'.$file->getClientOriginalName();
                if($file->move($path,$modifiedFileName)){
                    $data->image = $path.$modifiedFileName;
                }
            }
            $data->save();
        } else {
            $data = new seos;
            $data->site_title = $request->site_title;
            $data->title = $request->title;
            $data->site_name = $request->site_name;
            $data->keyword = $request->keyword;
            $data->author = $request->author;
            $data->url = $request->url;
            $data->description = $request->description;
            $data->type = "admin";
            $data->p_id = "1";
            if($data->save()) {
                if(!empty($request->image) && $request->image != "undefined"){
                    $file =  $request->image;
                    $path = 'uploads/image/';
                    $modifiedFileName = time().'-'.$file->getClientOriginalName();
                    if($file->move($path,$modifiedFileName)){
                        $data->image = $path.$modifiedFileName;
                    }
                }
                $data->save();
            }
        }
        return back()->with('message', 'Cập nhật thành công');
    }

    public function getOtherSetting() {
        $setting = settings::first();
        return view('backend.setting.other', compact('setting'));
    }

    public function postOtherSetting(Request $request) {
    	// dd($request->color);
    	$rules = [
            'web_phone' => 'required',
            'web_address' => 'required',
            'web_footer_content' => 'required',
            'color' => 'required',
        ];
        $messages = [
            'web_phone.required' => 'Số điện thoại không được để trống',
            'web_address.required' => 'Địa chỉ không được để trống',
            'web_footer_content.required' => 'Footer content không được để trống',
            'color.required' => 'Màu nên không được để trống',
        ];
        if(!empty($request->logo)) {
            $rules = [
                'logo' => 'required | mimes:png,jpeg,jpg,agv,gif',
            ];
            $messages = [
                'logo.required' => 'Logo không được để trống',
                'logo.mimes' => 'Logo không đúng định dạng',
            ];
        }
        if(!empty($request->web_email)) {
            $rules = [
                'web_email' => 'required | email',
            ];
            $messages = [
                'web_email.required' => 'Email không được để trống',
                'web_email.email' => 'Email không đúng định dạng',
            ];
        }
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
        	$data = settings::first();
        	if(!empty($data)) {
        		$data->phone = $request->web_phone;
                $data->email = $request->web_email;
	            $data->address = $request->web_address;
	            $data->footer_content = $request->web_footer_content;
	            $data->fanpage_id = $request->web_facebook_page;
	            $data->twitter_id = $request->web_twitter_page;
	            $data->skype_id = $request->web_skype_id;
	            $data->Analytics_code = $request->web_analytics_code;
	            $data->color = $request->color;
                if(!empty($request->logo) && $request->logo != "undefined"){
                    $file =  $request->logo;
                    $path = 'uploads/logo/';
                    $modifiedFileName = time().'-'.$file->getClientOriginalName();
                    if($file->move($path,$modifiedFileName)){
                        $data->logo = $path.$modifiedFileName;
                    }
                }
                $data->save();
        	} else {
	            $data = new settings;
	            $data->phone = $request->web_phone;
                $data->email = $request->web_email;
	            $data->address = $request->web_address;
	            $data->footer_content = $request->web_footer_content;
	            $data->fanpage_id = $request->web_facebook_page;
	            $data->twitter_id = $request->web_twitter_page;
	            $data->skype_id = $request->web_skype_id;
	            $data->Analytics_code = $request->web_analytics_code;
	            $data->color = $request->color;
	            if($data->save()) {
	                if(!empty($request->logo) && $request->logo != "undefined"){
	                    $file =  $request->logo;
	                    $path = 'uploads/logo/';
	                    $modifiedFileName = time().'-'.$file->getClientOriginalName();
	                    if($file->move($path,$modifiedFileName)){
	                        $data->logo = $path.$modifiedFileName;
	                    }
	                }
	                $data->save();
	            }
        	}
            // dd($data);
            return back()->with('message', 'Cập nhật thành công!');
        }
    }

    public function getSlider() {
        $data = sliders::orderBy('created_at', 'desc')->paginate(3);
        return view('backend.setting.slider', compact('data'));
    }

    public function getAddSlider() {
        return view('backend.setting.slider_add');
    }
    public function postAddSlider(Request $request) {
        $rules = [
            'title' => 'required',
            'link' => 'required | url',
            'image' => 'required | mimes:png,jpeg,jpg,agv,gif',
        ];
        $messages = [
            'title.required' => 'Tiêu đề không được để trống',
            'link.required' => 'Đường link không được để trống',
            'link.url' => 'Đường link không đúng dịnh dạng',
            'image.required' => 'Ảnh không được để trống',
            'image.mimes' => 'Ảnh không đúng định dạng',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
            $data = new sliders;
            $data->title = $request->title;
            $data->link = $request->link;
            $data->status = $request->status;
            if(!empty($request->image) && $request->image != "undefined"){
                $file =  $request->image;
                $path = 'uploads/slider/';
                $modifiedFileName = time().'-'.$file->getClientOriginalName();
                if($file->move($path,$modifiedFileName)){
                    $data->image = $path.$modifiedFileName;
                }
            }
            $data->save();
            // dd($data);
            return redirect()->intended('admin/setting/slider')->with('message', 'Thêm mới slider thành công!');
        }
    }

    public function getUpdateSlider($id) {
        $data = sliders::find($id);
        return view('backend.setting.slider_update', compact('data'));
    }
    public function postUpdateSlider(Request $request, $id) {
        $rules = [
            'title' => 'required',
            'link' => 'required | url',
            'image' => 'required | mimes:png,jpeg,jpg,agv,gif',
        ];
        $messages = [
            'title.required' => 'Tiêu đề không được để trống',
            'link.required' => 'Đường link không được để trống',
            'link.url' => 'Đường link không đúng dịnh dạng',
            'image.required' => 'Ảnh không được để trống',
            'image.mimes' => 'Ảnh không đúng định dạng',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
            $data = sliders::where('id', $id)->first();
            if(empty($data)) {
                return redirect()->intended('admin/setting/slider')->with('message', 'Slider ko tồn tại');
            } else {
                $data->title = $request->title;
                $data->link = $request->link;
                $data->status = $request->status;
                if(!empty($request->image) && $request->image != "undefined"){
                    $file =  $request->image;
                    $path = 'uploads/slider/';
                    $modifiedFileName = time().'-'.$file->getClientOriginalName();
                    if($file->move($path,$modifiedFileName)){
                        $data->image = $path.$modifiedFileName;
                    }
                }
                $data->save();
            }
            // dd($data);
            return redirect()->intended('admin/setting/slider')->with('message', 'Cập nhật slider thành công!');
        }
    }

    public function postDeleteSliders(Request $request) {
        $data = sliders::find($request->id)->delete();
        return response()->json($data);
    }
}
