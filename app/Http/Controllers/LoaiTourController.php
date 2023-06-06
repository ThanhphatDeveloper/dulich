<?php

namespace App\Http\Controllers;

use App\Models\LoaiTour;
use App\Http\Requests\StoreLoaiTourRequest;
use App\Http\Requests\UpdateLoaiTourRequest;

class LoaiTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst_loaitours=LoaiTour::all();
        return view('admin.loaitours.loaitour-index', ['lst'=>$lst_loaitours]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.loaitours.loaitour-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoaiTourRequest $request)
    {
        //dd($request);
        $l = LoaiTour::create([
            'loaitour'=>$request->loaitour,
        ]);
        $l->save();
        return redirect()->route('loaitours.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(LoaiTour $loaiTour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoaiTour $loaiTour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoaiTourRequest $request, LoaiTour $loaiTour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoaiTour $loaitour)
    {
        $loaitour->delete();
        return redirect()->route('loaitours.index');
    }
}
