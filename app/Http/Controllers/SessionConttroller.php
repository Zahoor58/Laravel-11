<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionConttroller extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
