<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use App\Categories;
use App\seos;
use Validator;

class ProductsController extends Controller
{
    public function getProduct() {
        $data = Products::orderBy('created_at', 'desc')->paginate(10);
    	return view('backend.product.index', compact('data'));
    }

    public function getAddProduct() {
        $category = Categories::where('cate_parent', '!=', 0)->orderBy('created_at', 'desc')->get();
        $category_not_child = Categories::whereNull('cate_parent')->orderBy('created_at', 'desc')->get();
        // dd($category);
    	return view('backend.product.add', compact('category', 'category_not_child'));
    }

    public function postAddProduct(Request $request) {
        $rules = [
            'prod_name' => 'required',
            'cate_id' => 'required',
            'prod_img' => 'required',
            'prod_gallery' => 'required',
        ];
        $messages = [
            'prod_name.required' => 'Sản phẩm không được để trống',
            'cate_id.required' => 'Loại sản phẩm không được để trống',
            'prod_img.required' => 'Ảnh sản phẩm không được để trống',
            'prod_gallery.required' => 'Thư viện ảnh không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
            $data = new Products;
            $data->tag_id = json_encode($request->tag_id);
            $data->prod_price = $request->prod_price;
            $data->prod_guarantee = $request->prod_guarantee;
            $data->prod_sale = $request->prod_sale;
            if(intval($request->prod_sale) != 0) {
                $data->prod_price_sale = $request->prod_price*$request->prod_sale;
            } else {
                $data->prod_price_sale = $request->prod_price;
            }
            $data->prod_short_description = $request->prod_short_description;
            $data->prod_description = $request->prod_description;
            $data->prod_content = $request->prod_content;
            $data->prod_amount = $request->prod_amount;
            $data->prod_view = $request->prod_view;
            $data->cate_id = $request->cate_id;
            $data->rate_id = $request->rate_id;
            $data->hot = $request->hot;
            $data->installment = $request->installment;
            if($data->save()) {
                $data->prod_name = $request->prod_name;
                $check = Products::where('prod_name', $request->prod_name)->first();
                if(!empty($check)) {
                    $data->prod_slug = str_slug($request->prod_name.'-'.$data->id);
                } else {
                    $data->prod_slug = str_slug($request->prod_name);
                }
                if(!empty($request->prod_img) && $request->prod_img != "undefined"){
                    $file =  $request->prod_img;
                    $path = 'uploads/products/';
                    $modifiedFileName = time().'-'.$file->getClientOriginalName();
                    if($file->move($path,$modifiedFileName)){
                        $data->prod_img = $path.$modifiedFileName;
                    }
                }
                // dd($request->prod_gallery);
                if($files=$request->file('prod_gallery')){
                    foreach($files as $file){
                        $path = 'uploads/products/gallery/'.$data->id.'/';
                        $name=time().'_'.$file->getClientOriginalName();
                        if($file->move($path,$name)) {
                            $name = $path.$name;
                            $prod_gallery[]=$name;                    
                        }

                    }
                }
                $data->prod_gallery = implode("|",$prod_gallery);
                $data->save();
                $seo = new seos;
                $seo->title = $data->prod_name;
                $seo->description = cutString($request->prod_description, 255);
                $seo->author = $_SERVER['HTTP_HOST'];
                $seo->keyword = $data->prod_name;
                $seo->url = url('/products/'.$data->prod_slug);
                $seo->image = $data->prod_img;
                // $seo->site_name = $_SERVER['REQUEST_URI'];
                $seo->type = 'product';
                $seo->p_id = $data->id;
                $seo->status = 0;
                $seo->save();
            }
            // dd($data);
            return redirect()->intended('admin/product')->with('message', 'Thêm mới sản phẩm thành công!');
        }
    }

    public function getUpdateProduct($id) {
        $data = Products::find($id);
        $category = Categories::where('cate_parent', '!=', 0)->orderBy('created_at', 'desc')->get();
        $category_not_child = Categories::whereNull('cate_parent')->orderBy('created_at', 'desc')->get();
        $seo = seos::where('type', 'product')->where('p_id', $id)->first();
        return view('backend.product.update', compact('data', 'category', 'category_not_child', 'seo'));
    }

    public function postUpdateProduct(Request $request, $id) {

        // dd($request->prop_gallery);
        $rules = [
            'prod_name' => 'required',
            'cate_id' => 'required',
        ];
        $messages = [
            'prod_name.required' => 'Sản phẩm không được để trống',
            'cate_id.required' => 'Loại sản phẩm không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
            $data = Products::find($id);
            $data->prod_name = $request->prod_name;
            $data->tag_id = json_encode($request->tag_id);
            $data->prod_price = $request->prod_price;
            $data->prod_guarantee = $request->prod_guarantee;
            $data->prod_sale = $request->prod_sale;
            if(intval($request->prod_sale) != 0) {
                $data->prod_price_sale = $request->prod_price*$request->prod_sale;
            } else {
                $data->prod_price_sale = $request->prod_price;
            }
            $data->prod_short_description = $request->prod_short_description;
            $data->prod_description = $request->prod_description;
            $data->prod_content = $request->prod_content;
            $data->prod_amount = $request->prod_amount;
            $data->prod_view = $request->prod_view;
            $data->cate_id = $request->cate_id;
            $data->rate_id = $request->rate_id;
            $data->hot = $request->hot;
            $data->installment = $request->installment;
            $check = Products::where('prod_name', $request->prod_name)->first();
            if(!empty($check)) {
                $data->prod_slug = str_slug($request->prod_name.'-'.$data->id);
            } else {
                $data->prod_slug = str_slug($request->prod_name);
            }
            if($data->save()) {
                if(!empty($request->prod_img) && $request->prod_img != "undefined"){
                    $file =  $request->prod_img;
                    $path = 'uploads/products/';
                    $modifiedFileName = time().'-'.$file->getClientOriginalName();
                    if($file->move($path,$modifiedFileName)){
                        $data->prod_img = $path.$modifiedFileName;
                    }
                }
                if(!empty($request->prod_gallery)) {
                    if($files=$request->file('prod_gallery')){
                        foreach($files as $file){
                            $path = 'uploads/products/gallery/'.$data->id.'/';
                            $name=time().'_'.$file->getClientOriginalName();
                            if($file->move($path,$name)) {
                                $name = $path.$name;
                                $prod_gallery[]=$name;                    
                            }

                        }
                    }
                    $data->prod_gallery = implode("|",$prod_gallery);
                    $data->save();
                }
                
                $seo = seos::where('type', 'product')->where('p_id', $data->id)->where('status', 0)->first();
                if(!empty($seo)) {
                    $seo->title = $data->prod_name;
                    $seo->description = cutString($request->prod_description, 255);
                    $seo->author = $_SERVER['HTTP_HOST'];
                    $seo->keyword = $data->prod_name;
                    $seo->url = url('/products/'.$data->prod_slug);
                    $seo->image = $data->prod_img;
                    $seo->site_name = $_SERVER['REQUEST_URI'];
                    $seo->save();
                } else {
                    $seo = new seos;
                    $seo->title = $data->prod_name;
                    $seo->description = cutString($request->prod_description, 255);
                    $seo->author = $_SERVER['HTTP_HOST'];
                    $seo->keyword = $data->prod_name;
                    $seo->url = url('/products/'.$data->prod_slug);
                    $seo->image = $data->prod_img;
                    // $seo->site_name = $_SERVER['REQUEST_URI'];
                    $seo->type = 'product';
                    $seo->p_id = $data->id;
                    $seo->status = 0;
                    $seo->save();
                }
            }
            // dd($data);
            return redirect()->intended('admin/product')->with('message', 'Cập nhật sản phẩm thành công!');
        }
    }

    public function uploadImgProduct(Request $request) {
    	$validator = Validator::make($request->all(), [
        	'prod_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    	]);
 
    	if ($validator->passes()) {
  	 		$data = new Products;
  	 		$data->prod_name = time().'abc';
  	 		if($data->save()) {
  		 		if(!empty($request->prod_img) && $request->prod_img != "undefined"){
                    $file =  $request->prod_img;
                    $path = 'uploads/products/';
                    $modifiedFileName = time().'-'.$file->getClientOriginalName();
                    if($file->move($path,$modifiedFileName)){
                        $data->prod_img = $path.$modifiedFileName;
                        $data->save();
                    }
                }
	 		}
      	return response()->json(['success'=>'done', 'data'=>$data]);
    	}
    	return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function postDeleteProducts(Request $request) {
        $data = Products::find($request->id);
        if(!empty($data)){
            $file = $data->prod_img;
            if(file_exists($file)){
                unlink($file);
            }
            $data = $data->delete();
        }
        return response()->json($data);
    }
}
