<?php

namespace App\Http\Controllers;

use App\Models\CustomerHomepage;
use App\Models\Tour;
use App\Http\Requests\StoreCustomerHomepageRequest;
use App\Http\Requests\UpdateCustomerHomepageRequest;

class CustomerHomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst = Tour::orderBy('created_at','DESC')->get();
        //dd($lst[0]->tentour);
        return view('customer.home-page', ['lst'=>$lst]);
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
