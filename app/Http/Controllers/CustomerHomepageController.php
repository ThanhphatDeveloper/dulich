<?php

namespace App\Http\Controllers;

use App\Models\CustomerHomepage;
use App\Models\Tour;
use App\Models\Blog;
use App\Http\Requests\StoreCustomerHomepageRequest;
use App\Http\Requests\UpdateCustomerHomepageRequest;
use Illuminate\Support\Facades\Storage;

class CustomerHomepageController extends Controller
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst = Tour::where('trangthai', 1)->orderBy('updated_at','DESC')->take(6)->get();
        $lst_blog = Blog::where('trangthai', 1)->orderBy('updated_at','DESC')->take(4)->get();

        foreach($lst_blog as $u){
            $this->fixImage($u);
        }
        //dd($lst);
        return view('customer.home-page', ['lst'=>$lst, 'lst_blog'=>$lst_blog]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerHomepageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerHomepage $customerHomepage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerHomepage $customerHomepage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerHomepageRequest $request, CustomerHomepage $customerHomepage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerHomepage $customerHomepage)
    {
        //
    }
}
