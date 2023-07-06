<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerBlogController extends Controller
{
    protected function fixImage(Blog $u)
    {
        //1 hình bất kì để vào folder public/img
        if($u->anhdaidien && Storage::disk('public')->exists($u->anhdaidien)){
            $u->anhdaidien = Storage::url($u->anhdaidien);
        } else{
            $u->anhdaidien = '/img/test.gif';
        }
    }

    public function index()
    {
        $lst=Blog::search()->where('trangthai', 1)->orderBy('updated_at','DESC')->paginate(10);

        foreach($lst as $u){
            $this->fixImage($u);
        }
        
        return view('customer.list-blog', compact('lst'));
    }

    public function show($id)
    {
        $blog = Blog::where('id', $id)->first();

        return view('customer.blog-detail', ['blog'=>$blog]);
    }
}