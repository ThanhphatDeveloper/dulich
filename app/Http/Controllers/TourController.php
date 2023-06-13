<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\LoaiTour;
use App\Models\ImageTour;
use App\Models\DiaDiem;
use App\Models\NhaCungCap;
use App\Models\ThoiGianTour;
use App\Models\KhuyenMai;
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
        $lst_diadiem=DiaDiem::all();
        return view('admin.tours.tour-index', compact('lst'), ['lst_diadiem'=>$lst_diadiem]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tours.tour-create');
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
        $lst_dd=DiaDiem::all();
        $lst_loai_tour=LoaiTour::all();
        $lst_ncc=NhaCungCap::all();
        $lst_tg=ThoiGianTour::all();
        $lst_km=KhuyenMai::all();

        return view('admin.tours.tour-show', ['t'=>$tour],
        ['lst_img'=>$lst_img,
        'lst_dd'=>$lst_dd,
        'lst_loai_tour'=>$lst_loai_tour,
        'lst_ncc'=>$lst_ncc,
        'lst_tg'=>$lst_tg,
        'lst_km'=>$lst_km
        ]);
        //['lst_dd'=>$lst_dd], ['lst_loai_tour'=>$lst_loai_tour]
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
