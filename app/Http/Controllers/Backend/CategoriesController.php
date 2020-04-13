<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use Validator;
class CategoriesController extends Controller
{
    public function getCategory() {
        // $data = Categories::find(5)->nameCateParent;
        $data = Categories::orderBy('created_at', 'desc')->with('nameCateParent')->paginate(10);
        // dd($data);
    	return view('backend.category.index', compact('data'));
    }

    public function listParentCategories() {
    	$data = Categories::get();
        // dd($data);
    	return response()->json($data);
    }

    public function addCategory(Request $request) {
        // return 1;
    	$status = 0;
    	$errors = [];
        $messages = [];
    	$rules = [
            'cate_name' => 'required',
        ];
        $messages = [
            'cate_name.required' => 'Danh mục không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
            if($request->type == 'add') {
                $data2 = Categories::where('cate_name', $request->cate_name)->first();
                if(!empty($data2)) {
                    $messages = ['code'=>'406', 'message'=>'Danh mục đã tồn tại'];
                    return response()->json(compact('status', 'data', 'errors', 'messages'));
                } else {
                    $data2 = new Categories;
                    $data2->cate_name = $request->cate_name;
                    $data2->cate_slug = str_slug($request->cate_name);
                    $data2->cate_content = $request->cate_content;
                    $data2->cate_parent = $request->cate_parent;
                    if(!empty($request->cate_img) && $request->cate_img != "undefined"){
                        $file =  $request->cate_img;
                        $path = 'uploads/categories/';
                        $modifiedFileName = time().'-'.$file->getClientOriginalName();
                        if($file->move($path,$modifiedFileName)){
                            $data2->cate_img = $path.$modifiedFileName;
                        }
                    }
                    if($data2->save()) {
                        $data = Categories::where('id', $data2->id)->with('nameCateParent')->first();
                    }
                    $status = 1;
                    $messages = ['code'=>'200', 'message'=>'Thêm mới thành công.'];
                    return response()->json(compact('status', 'data', 'errors', 'messages'));
                }
            } 
            if($request->type == 'update') {
                $data2 = Categories::where('id', $request->id)->first();
                if(empty($data2)) {
                    $messages = ['code'=>'102', 'message'=>'Danh mục không tồn tại'];
                } else {
                    $data2->cate_name = $request->cate_name;
                    $data2->cate_slug = str_slug($request->cate_name);
                    $data2->cate_content = $request->cate_content;
                    $data2->cate_parent = $request->cate_parent;
                    if(!empty($request->cate_img) && $request->cate_img != "undefined"){
                        $file =  $request->cate_img;
                        $path = 'uploads/categories/';
                        $modifiedFileName = time().'-'.$file->getClientOriginalName();
                        if($file->move($path,$modifiedFileName)){
                            $data2->cate_img = $path.$modifiedFileName;
                        }
                    }
                    if($data2->save()) {
                        $data = Categories::where('id', $request->id)->with('nameCateParent')->first();
                    }
                    $status = 2;
                    $messages = ['code'=>'200', 'message'=>'Cập nhật thành công.'];
                }
                return response()->json(compact('status', 'data', 'errors', 'messages'));
            }
            
        }
    }

    public function delCate(request $request){
        $data = Categories::find($request->id)->delete();
        return response()->json($data);
    }
}
