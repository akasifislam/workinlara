<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        $masters = array("laravel scope", "blade component", "mutators & accessors");
        return view('welcome', compact('masters'));
    }
}
