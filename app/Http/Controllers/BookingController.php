<?php

namespace App\Http\Controllers;

use App\Helper\VoyargeHelper;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request){
        return view('booking.index');
    }

    public function search(Request $request){


        return view('booking.search');
    }

    public function check(Request $request){


        return view('booking.check');
    }

    public function book(Request $request){
        return view('booking.book');
    }
    public function completed(Request $request){
        return view('booking.completed');
    }
}
