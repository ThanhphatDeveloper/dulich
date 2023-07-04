<?php

namespace App\Http\Controllers;

use App\Models\ThanhToan;
use App\Http\Requests\StoreThanhToanRequest;
use App\Http\Requests\UpdateThanhToanRequest;
use Carbon\Carbon;

class ThanhToanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst=ThanhToan::search()->orderBy('updated_at','DESC')->paginate(10);
        return view('admin.thanhtoans.thanhtoan-index', compact('lst'));
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
    public function store(StoreThanhToanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ThanhToan $thanhToan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ThanhToan $thanhToan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateThanhToanRequest $request, ThanhToan $thanhToan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ThanhToan $thanhtoan)
    {
        $thanhtoan->fill([
            'trangthai'=>0,
            'thoigianxoa'=>Carbon::now()->toDateTimeString(),
        ]);
        $thanhtoan->save();
        return redirect()->route('thanhtoans.index');
    }
}
