<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function redirect()
    {
        $user = Auth::user();
        if ($user->hasRole('administrator')) {
            return to_route('administrator.dashboard');
        } elseif ($user->hasRole('editor')) {
            return to_route('editor.dashboard');
        }else{
            return to_route('home');
        }
        
    }
}