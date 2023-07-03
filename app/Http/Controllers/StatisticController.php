<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        return view('admin.thongke.thongke');
        // return view('admin.thongke.thongke', compact('lst'), ['diadiem'=>$lst_diadiem]);
    }
}
