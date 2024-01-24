<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function __invoke(Request $request)
    {
        Mail::to('larryylf@gmail.com')->send(new OrderShipped('hello'));
    }
}
