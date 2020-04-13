<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;
use App\Categories;
use App\seos;
use Validator;

class PostsController extends Controller
{
    public function getPosts() {
    	$data = Posts::orderBy('created_at', 'desc')->paginate(10);
        // dd($data);
    	return view('backend.post.index', compact('data'));
    }

    public function getAddPosts() {
        $category = Categories::orderBy('created_at', 'desc')->get();
    	return view('backend.post.add', compact('category'));
    }

    public function postAddPosts(Request $request) {
        // dd(substr(strip_tags($request->post_content), 0, 255));
    	$messages = [];
    	$rules = [
            'post_name' => 'required',
            'post_img' => 'required | mimes:jpg,png,jpeg,gif',
            'post_content' => 'required',
            'post_description' => 'required',
        ];
        $messages = [
            'post_name.required' => 'Tiêu đề không được để trống',
            'post_img.required' => 'Ảnh không được để trống',
            'post_img.mimes' => 'Ảnh không đúng định dạng',
            'post_content.required' => 'Nội dung không được để trống',
            'post_description.required' => 'Mô tả ngắn không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
        	$data = new Posts;
        	$data->post_content = $request->post_content;
            $data->post_description = $request->post_description;
        	$data->post_status = $request->post_status;
            $data->cate_id = $request->cate_id;
        	if($data->save()) {
        	    $data->post_name = $request->post_name;
        	    $check = Posts::where('post_name', $request->post_name)->first();
	            if(!empty($check)) {
	        		$data->post_slug = str_slug($request->post_name.'-'.$data->id);
	            } else {
	        		$data->post_slug = str_slug($request->post_name);
	        	}
  		 		if(!empty($request->post_img) && $request->post_img != "undefined"){
  		            $file =  $request->post_img;
  		            $path = 'uploads/posts/';
  		            $modifiedFileName = time().'-'.$file->getClientOriginalName();
  		            if($file->move($path,$modifiedFileName)){
  		                $data->post_img = $path.$modifiedFileName;
  		                $data->save();
  		            }
  		        }
  		        $messages[] = ['code'=>200, 'message'=>'Thêm mới thành công!'];
                
                $seo = new seos;
                $seo->title = $data->post_name;
                $seo->description = cutString($request->post_description, 255);
                $seo->author = url('/');
                $seo->keyword = $data->post_name;
                $seo->url = url('/news/'.$data->post_slug);
                $seo->image = $data->post_img;
                $seo->site_name = $_SERVER['HTTP_HOST'];
                $seo->type = 'post';
                $seo->p_id = $data->id;
                $seo->status = 0;
                $seo->save();
  	 		}
  	 		return redirect()->intended('admin/post')->with('messages','Thêm mới thành công');
        }
    }

    public function getUpdatePosts($id) {
    	$data = Posts::find($id);
        $category = Categories::orderBy('created_at', 'desc')->get();
        $seo = seos::where('type', 'post')->where('p_id', $id)->first();
    	return view('backend.post.update', compact('data', 'category', 'seo'));
    }

    public function postUpdatePosts(Request $request, $id) {
    	$rules = [
            'post_name' => 'required',
            'post_img' => 'mimes:jpg,png,jpeg,gif',
            'post_content' => 'required',
            'post_description' => 'required',
        ];
        $messages = [
            'post_name.required' => 'Tiêu đề không được để trống',
            'post_img.mimes' => 'Ảnh không đúng định dạng',
            'post_content.required' => 'Nội dung không được để trống',
            'post_description.required' => 'Mô tả ngắn không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
        	$data = Posts::find($id);
        	$check = Posts::where('post_name', $request->post_name)->first();
        	$data->post_name = $request->post_name;
        	if(!empty($check)) {
        		$data->post_slug = str_slug($request->post_name.'-'.$data->id);
        	} else {
        		$data->post_slug = str_slug($request->post_name);
        	}
        	$data->post_description = $request->post_description;
            $data->post_content = $request->post_content;
        	$data->post_status = $request->post_status;
            $data->cate_id = $request->cate_id;
	 		if(!empty($request->post_img) && $request->post_img != "undefined"){
	            $file =  $request->post_img;
	            $path = 'uploads/posts/';
	            $modifiedFileName = time().'-'.$file->getClientOriginalName();
	            if($file->move($path,$modifiedFileName)){
	                $data->post_img = $path.$modifiedFileName;
	            }
	        }
	        if($data->save()) {
                $seo = seos::where('type', 'post')->where('p_id', $data->id)->where('status', 0)->first();
                if(!empty($seo)) {
                    $seo->title = $data->post_name;
                    $seo->description = cutString($request->post_description, 255);
                    $seo->author = url('/');
                    $seo->keyword = $data->post_name;
                    $seo->url = url('/news/'.$data->post_slug);
                    $seo->image = $data->post_img;
                    $seo->site_name = $_SERVER['HTTP_HOST'];
                    $seo->save();
                } else {
                    $seo = new seos;
                    $seo->title = $data->post_name;
                    $seo->description = cutString($request->post_description, 255);
                    $seo->author = url('/');
                    $seo->keyword = $data->post_name;
                    $seo->url = url('/news/'.$data->post_slug);
                    $seo->image = $data->post_img;
                    $seo->site_name = $_SERVER['HTTP_HOST'];
                    $seo->type = 'post';
                    $seo->p_id = $data->id;
                    $seo->status = 0;
                    $seo->save();
                }
            }
  	 		return redirect()->intended('admin/post')->with('messages','Cập nhật thành công');
        }
    }

    public function postDeletePosts(Request $request) {
    	$data = Posts::find($request->id);
        if(!empty($data)){
            $file = $data->post_img;
            if(file_exists($file)){
                unlink($file);
            }
            $data = $data->delete();
        }
        return response()->json($data);
    }
}
