<?php

namespace App\Http\Controllers;

use App\Models\BookTour;
use App\Models\Tour;
use App\Models\ImageTour;
use App\Http\Requests\StoreBookTourRequest;
use App\Http\Requests\UpdateBookTourRequest;

class BookTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst = Tour::orderBy('updated_at','DESC')->paginate(6);
        $lst_img = ImageTour::all();
        return view('customer.list-tour', compact('lst'), ['lst_img'=>$lst_img]);
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
    public function show(Tour $tour)
    {
        dd($tour);
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
