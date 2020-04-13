<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ordercode;
use App\orders;

class OrdersController extends Controller
{
    public function listOrders() {
    	$orders = ordercode::where('status', 0)->with('users')->with('orders')->paginate(10);
    	// dd($orders);
    	return view('backend.order.index', compact('orders'));
    }

    public function confirmOrders(Request $request) {
    	$message = [];
    	$data = ordercode::find($request->id);
        if(!empty($data)){
            $data->status = 1;
            if($data->save()) {
                $orders = ordercode::find($request->id)->orders;
                foreach($orders as $key=>$order) {
                    $order->status = 1;
                    $order->save();
                }
            }
            $message[] = ['code'=>200, 'message'=>'Bạn đã xác nhận thanh toán thành công!'];
        } else {
            $message[] = ['code'=>204, 'message'=>'Không tìm thấy đơn hàng!'];
        }
        return response()->json($message);
    }

    public function delOrders(Request $request) {
    	$message = [];
    	$data = ordercode::find($request->id);
        if(!empty($data)){
            $data = $data->delete();
            $message[] = ['code'=>200, 'message'=>'Bạn đã xóa đơn hàng thành công!'];
        } else {
            $message[] = ['code'=>205, 'message'=>'Không tìm thấy đơn hàng!'];
        }
        return response()->json($data);
    }
}
