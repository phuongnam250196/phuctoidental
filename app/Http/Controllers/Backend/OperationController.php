<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\month_price;
use App\room_price;
use Validator;
use Carbon\Carbon;

class OperationController extends Controller
{

	public function getOperation() { 
       $mth = month_price::orderBy('created_at', 'desc')->first();
       if(!empty($mth)) {
            $rooms = room_price::where('month_id', $mth->id)->get();
       } else {
            $rooms = '';
       }
		$mth = Carbon::now()->month;
		return view('backend.operation.index', compact('rooms', 'mth'));
	}

	public function addMonth(Request $request) {

		// dd("Tháng ".Carbon::now()->month." (".date_format(Carbon::now(), 'd-m-Y').")");
		$messages = [];
    	$rules = [
            // 'month_name' => 'required',
            'electricity' => 'required',
            'water' => 'required',
            'network' => 'required',
        ];
        $messages = [];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
        	$data = new month_price;
        	$data->month_name = "Tháng ".Carbon::now()->month." (".date_format(Carbon::now(), 'd-m-Y').")";
        	// $data->month_name = "Tháng 9 (22-11-2019)";
            $data->electricity = $request->electricity;
        	$data->water = $request->water;
            $data->network = $request->network;
            if($data->save()) {
            	$r2 = new room_price;
            	$r2->room_name = 'Tầng 2 (01946)';
            	$r2->room_code = 'fl2';
            	$r2->month_id = $data->id;
            	$r2->save();

            	$r3 = new room_price;
            	$r3->room_name = 'Tầng 3 (01955)';
            	$r3->room_code = 'fl3';
            	$r3->month_id = $data->id;
            	$r3->save();

            	$r4 = new room_price;
            	$r4->room_name = 'Tầng 4 (01953)';
            	$r4->room_code = 'fl4';
            	$r4->month_id = $data->id;
            	$r4->save();

                if(!empty($request->image_dien) && $request->image_dien != "undefined"){
                    $file =  $request->image_dien;
                    $path = 'uploads/month/'.$data->id.'/';
                    $modifiedFileName = time().'-'.$file->getClientOriginalName();
                    if($file->move($path,$modifiedFileName)){
                        $data->image_dien = $path.$modifiedFileName;
                    }
                }
                if(!empty($request->image_nuoc) && $request->image_nuoc != "undefined"){
                    $file =  $request->image_nuoc;
                    $path = 'uploads/month/'.$data->id.'/';
                    $modifiedFileName = time().'-'.$file->getClientOriginalName();
                    if($file->move($path,$modifiedFileName)){
                        $data->image_nuoc = $path.$modifiedFileName;
                    }
                }
                if(!empty($request->image_mang) && $request->image_mang != "undefined"){
                    $file =  $request->image_mang;
                    $path = 'uploads/month/'.$data->id.'/';
                    $modifiedFileName = time().'-'.$file->getClientOriginalName();
                    if($file->move($path,$modifiedFileName)){
                        $data->image_mang = $path.$modifiedFileName;
                    }
                }
                $data->save();
            }
  	 		return back()->with('messages','Thêm mới thành công');
        }
	}


	public function getAddRoom() {
		$month_prices = month_price::orderBy('created_at', 'desc')->get();
        // dd($month_prices);
		return view('backend.operation.room', compact('month_prices'));
	}

	public function postAddRoom(Request $request) {
		// dd($_GET['room']-1);
		$messages = [];
    	$rules = [
            'amount_this_month' => 'required',
            'amount_people' => 'required',
            'image_this_month' => 'required',
        ];
        $messages = [];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
        	$data = new room_price;
    	    $data->room_name = 'Tầng '.$_GET['room'];
    	    $data->room_code = 'fl'.$_GET['room'];
    	    $data->amount_this_month = $request->amount_this_month;
    	    $data->amount_people = $request->amount_people;
    	    $data->amount_people = $request->amount_people;
    	    $data->month_id = $request->month_id;
    	    if($data->save()) {
    	    	if(!empty($request->image_this_month) && $request->image_this_month != "undefined"){
                    $file =  $request->image_this_month;
                    $path = 'uploads/price/';
                    $modifiedFileName = time().'-'.$file->getClientOriginalName();
                    if($file->move($path,$modifiedFileName)){
                        $data->image_this_month = $path.$modifiedFileName;
                        $data->save();
                    }
                }
    	    }
      
  	 		return back()->with('messages','Thêm mới thành công');
        }
	}

	public function getEditRoom($id) {
		$month_prices = month_price::orderBy('created_at', 'desc')->get();
		$room = room_price::find($id);
		$room_lists = room_price::where('room_code', $room->room_code)->orderBy('created_at', 'desc')->skip(1)->first();
		// dd($room);
		return view('backend.operation.room', compact('month_prices', 'room_lists', 'room'));
	}
	public function postEditRoom(Request $request, $id) {
		$messages = [];
    	$rules = [
            'amount_this_month' => 'required',
            'amount_people' => 'required',
        ];
        $messages = [];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
        	$data = room_price::find($id);
    	    $data->amount_last_month = $request->amount_last_month;
    	    $data->amount_this_month = $request->amount_this_month;
    	    $data->amount_people = $request->amount_people;
    	    // $data->month_id = $request->month_id;
    	    if($data->save()) {
    	    	if(!empty($request->image_this_month) && $request->image_this_month != "undefined"){
                    $file =  $request->image_this_month;
                    $path = 'uploads/price/';
                    $modifiedFileName = time().'-'.$file->getClientOriginalName();
                    if($file->move($path,$modifiedFileName)){
                        $data->image_this_month = $path.$modifiedFileName;
                		$data->save();
                    }
                }
                if(!empty($request->image_last_month) && $request->image_last_month != "undefined"){
                    $file =  $request->image_last_month;
                    $path = 'uploads/price/';
                    $modifiedFileName = time().'-'.$file->getClientOriginalName();
                    if($file->move($path,$modifiedFileName)){
                        $data->image_last_month = $path.$modifiedFileName;
                		$data->save();
                    }
                }
    	    }
      
  	 		return back()->with('messages','Thêm mới thành công');
        }
	}

	public function getTotal() {
		$month_price = month_price::orderBy('created_at', 'desc')->first();
        $rooms = month_price::orderBy('created_at', 'desc')->first()->room_price;
        // $totalM = 0;
        // foreach($rooms as $room) {
        //     $totalM += $room->amount_this_month - $room->amount_last_month;
        // }
        // foreach($rooms as $room) {
        //     $room->room_water = round($month_price->water/3);
        //     $room->room_network = round($month_price->network/3);
        //     $room->room_electricity = round((($room->amount_this_month - $room->amount_last_month)/$totalM)*$month_price->electricity);
        //     $room->save();
        // }
		// dd($totalM);
		return view('backend.operation.total', compact('month_price', 'rooms'));
	}
    public function postTotal(Request $request) {
        $month_price = month_price::orderBy('created_at', 'desc')->first();
        $rooms = month_price::orderBy('created_at', 'desc')->first()->room_price;
        $totalM = 0;
        foreach($rooms as $room) {
            $totalM += $room->amount_this_month - $room->amount_last_month;
        }
        foreach($rooms as $room) {
            $room->room_water = round($month_price->water/3);
            $room->room_network = round($month_price->network/3);
            $room->room_electricity = round((($room->amount_this_month - $room->amount_last_month)/$totalM)*$month_price->electricity);
            $room->room_total = round($month_price->water/3) + round($month_price->network/3) + round((($room->amount_this_month - $room->amount_last_month)/$totalM)*$month_price->electricity);
            $room->save();
        }
        return back()->with('messages', 'Tính tiền thành công!');
    }


    public function getOperation2() {
    	return 1;
    	// $message = [];
     //    $rules = [
     //        'id' => 'required',
     //    ];
     //    $messages = [
     //        'id.required' => 'Id không được để trống',
     //    ];
     //    $validator = Validator::make($request->all(), $rules, $messages);
     //    if ($validator->fails()) {
     //        return back()->withInput()->withErrors($validator->errors());
     //    } else {
            $data = carts::where('product_id', $request->id)->where('user_id', $request->user_id)->where('status', 0)->first();
            dd($data);
            if(!empty($data)) {
                $data->amount += 1;
                $data->price = $request->price*$data->amount;
                $data->save();
                $message = ['code'=>'200', 'message'=>'Thêm sản phẩm vào giỏ hàng thành công!'];
                $data = carts::where('product_id', $request->id)->where('user_id', $request->user_id)->where('status', 0)->with('products')->first();
            } else {
                $data = new carts;
                $data->price = $request->price;
                $data->amount = 1;
                $data->product_id = $request->id;
                $data->user_id = $request->user_id;
                $data->status = 0;
                $data->save();
                $message = ['code'=>'200', 'message'=>'Thêm sản phẩm vào giỏ hàng thành công!'];
                $data = carts::where('product_id', $request->id)->where('status', 0)->where('user_id', $request->user_id)->orderBy('created_at', 'desc')->with('products')->first();
            }
            $prs = carts::where('user_id', $request->user_id)->where('status', 0)->get();
            $total = 0;
            foreach($prs as $key=>$pr) {
                $total += $pr->price;
            }
            $total = number_format($total, 0, '.', '.');
            $count = carts::where('user_id', $request->user_id)->where('status', 0)->count();
            return response()->json(compact('data', 'message', 'count', 'total'));
        // }
    }
}
