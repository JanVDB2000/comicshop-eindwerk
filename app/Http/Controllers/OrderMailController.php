<?php

namespace App\Http\Controllers;

use App\Mail\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderMailController extends Controller
{
    public function create(){
        return view('orderdetail-email');
    }
    public function store(Request $request){
        $data = Auth::user()->orders;
        Mail::to(request('email'))->send(new OrderDetail($data));

        return redirect('orderdetail-email');
    }
}
