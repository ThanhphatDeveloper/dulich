<?php

namespace App\Http\Controllers;

use App\Models\ImageTour;
use App\Models\Tour;
use App\Http\Requests\StoreImageTourRequest;
use App\Http\Requests\UpdateImageTourRequest;
use Illuminate\Http\Request;

class ImageTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //dd( $request->id);
        $lst = ImageTour::where('tour_id', '=', $request->id)->orderBy('created_at','DESC')->paginate(10);
        
        $tour = Tour::where('id', '=', $request->id)->first();

        return view('admin.tours.tour-image' , compact('lst'), ['tour'=>$tour]);
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
    public function store(StoreImageTourRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ImageTour $imageTour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImageTour $imageTour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageTourRequest $request, ImageTour $imageTour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImageTour $imagetour)
    {
        //
    }
}
