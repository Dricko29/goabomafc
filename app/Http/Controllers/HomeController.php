<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $club = Club::first();
        return view('frontend.home',compact('club'));
    }
}