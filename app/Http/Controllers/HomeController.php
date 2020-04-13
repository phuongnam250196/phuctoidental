<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\month_price;
use App\room_price;
use Validator;
use Carbon\Carbon;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('home');
    }

    public function getAPI() {
        $data = month_price::orderBy('created_at', 'desc')->with('room_price')->first();
        return response()->json($data)->header("Access-Control-Allow-Origin",  "*")->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
