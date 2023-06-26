<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function index()
    {
        return view('ckdata');
    }

    public function store(Request $request)
    {
        //dd($request->data);

        return view('show', ['data'=>$request->data]);
    }
}
