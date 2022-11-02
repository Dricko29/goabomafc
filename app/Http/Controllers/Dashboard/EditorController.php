<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function dashboard()
    {
        return view('backend.editor.dashboard');
    }
}