<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\ImageTour;
use App\Http\Requests\StoreTourRequest;
use App\Http\Requests\UpdateTourRequest;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $a=Tour::find(1);
        // dd($a->loai_tour->loaitour);

        $lst=Tour::search()->paginate(10);
        return view('admin.tours.tour-index', compact('lst'));
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
    public function store(StoreTourRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        $lst_img=ImageTour::all();
        return view('admin.tours.tour-show', ['t'=>$tour], ['lst_img'=>$lst_img]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTourRequest $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        //
    }
}
