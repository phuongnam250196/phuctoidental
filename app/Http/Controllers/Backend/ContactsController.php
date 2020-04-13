<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\contacts;

class ContactsController extends Controller
{
    public function getContacts() {
        $data = contacts::orderBy('created_at', 'desc')->paginate(10);
    	return view('backend.contact.index', compact('data'));
    }
    public function postDeleteContacts(Request $request) {
    	$data = contacts::find($request->id)->delete();
        return response()->json($data);
    }
}
