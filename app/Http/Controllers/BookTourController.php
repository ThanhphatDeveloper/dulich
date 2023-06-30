<?php

namespace App\Http\Controllers;

use App\Models\BookTour;
use App\Http\Requests\StoreBookTourRequest;
use App\Http\Requests\UpdateBookTourRequest;

class BookTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('customer.list-tour');
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
    public function store(StoreBookTourRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(BookTour $bookTour)
    // {
    //     return view('customer.tour-detail');
    // }

    public function show()
    {
        return view('customer.tour-detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookTour $bookTour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookTourRequest $request, BookTour $bookTour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookTour $bookTour)
    {
        //
    }
}
