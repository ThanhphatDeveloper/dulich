<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\DonHang;
use App\Models\Tour;
use App\Models\KhuyenMai;
use App\Http\Requests\StoreKhachHangRequest;
use App\Http\Requests\UpdateKhachHangRequest;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst = KhachHang::search()->orderBy('updated_at','DESC')->paginate(10);
        $lst_donhang = DonHang::all();

        return view('admin.khachhangs.khachhang-index', compact('lst'), ['lst_donhang' => $lst_donhang]);
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
    public function store(StoreKhachHangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //dd($id);
        $lst_tour = Tour::all();
        $khachhang = KhachHang::where('id', $id)->first();
        $lst_km = KhuyenMai::all();
        $lst = DonHang::search()->where('khach_hang_id', $id)->orderBy('updated_at','DESC')->paginate(10);
        return view('admin.khachhangs.donhang-dadat', compact('lst'),
        [
            'lst_tour'=>$lst_tour,
            'lst_km'=>$lst_km,
            'khachhang'=>$khachhang,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KhachHang $khachHang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKhachHangRequest $request, KhachHang $khachHang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KhachHang $khachHang)
    {
        //
    }
}
