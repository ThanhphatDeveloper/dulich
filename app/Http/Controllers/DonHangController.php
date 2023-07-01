<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\Tour;
use App\Models\KhuyenMai;
use App\Http\Requests\StoreDonHangRequest;
use App\Http\Requests\UpdateDonHangRequest;
use Carbon\Carbon;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst_tour = Tour::all();
        $lst_km = KhuyenMai::all();
        $lst = DonHang::search()->where('trangthai', '=', 0)->orderBy('created_at','DESC')->paginate(10);
        return view('admin.donhangs.donhang-chuaduyet', compact('lst'),
        [
            'lst_tour'=>$lst_tour,
            'lst_km'=>$lst_km,
        ]);
    }

    public function index_da_duyet()
    {
        $lst_tour = Tour::all();
        $lst_km = KhuyenMai::all();
        $lst = DonHang::search()->where('trangthai', '=', 1)->orderBy('created_at','DESC')->paginate(10);
        return view('admin.donhangs.donhang-daduyet', compact('lst'),
        [
            'lst_tour'=>$lst_tour,
            'lst_km'=>$lst_km,
        ]);
    }

    public function index_khong_duyet()
    {
        $lst_tour = Tour::all();
        $lst_km = KhuyenMai::all();
        $lst = DonHang::search()->where('thoigianxoa', '!=', null)->orderBy('created_at','DESC')->paginate(10);
        return view('admin.donhangs.donhang-khongduyet', compact('lst'),
        [
            'lst_tour'=>$lst_tour,
            'lst_km'=>$lst_km,
        ]);
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
    public function store(StoreDonHangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DonHang $donhang)
    {
        $lst_tour = Tour::all();
        $lst_km = KhuyenMai::all();
        return view('admin.donhangs.donhang-chuaduyet-show',
        [
            'donhang'=>$donhang,
            'lst_tour'=>$lst_tour,
            'lst_km'=>$lst_km,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DonHang $donhang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDonHangRequest $request, DonHang $donhang)
    {
        $donhang->fill([
            'trangthai'=>1,
        ]);
        $donhang->save();
        return redirect()->route('donhangs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DonHang $donhang)
    {
        $donhang->fill([
            'trangthai'=>0,
            'thoigianxoa'=>Carbon::now()->toDateTimeString(),
        ]);
        $donhang->save();
        return redirect()->route('donhangs.index');
    }
}
