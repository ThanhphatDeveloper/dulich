<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerBlogController extends Controller
{
    public function index()
    {

        //dd($lst[0]->tentour);
        return view('customer.list-blog');
    }


    public function show()
    {
        //
    }
}
