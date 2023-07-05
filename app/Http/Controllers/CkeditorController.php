<?php

namespace App\Http\Controllers;
use App\Models\Tour;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function index()
    {
        $lst = Tour::all();
        return view('customer.tour-detail', ['a'=>$lst]);


        //return view('ckdata');
    }

    public function store(Request $request)
    {
        //dd($request->data);

        return view('show', ['data'=>$request->data]);
    }
}
