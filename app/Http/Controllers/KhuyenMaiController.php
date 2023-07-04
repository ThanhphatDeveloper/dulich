<?php

namespace App\Http\Controllers;

use App\Models\KhuyenMai;
use App\Http\Requests\StoreKhuyenMaiRequest;
use App\Http\Requests\UpdateKhuyenMaiRequest;
use Carbon\Carbon;

class KhuyenMaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst=KhuyenMai::search()->orderBy('updated_at','DESC')->paginate(10);
        return view('admin.khuyenmais.khuyenmai-index', compact('lst'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.khuyenmais.khuyenmai-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKhuyenMaiRequest $request)
    {
        //dd($request);
        $k = KhuyenMai::create([
            'makhuyenmai'=>$request->makhuyenmai,
            'mota'=>$request->mota,
            'mucgiam'=>$request->mucgiam,
            'giatoithieu'=>$request->giatoithieu,
            'hansudung'=>$request->hansudung,
            'trangthai'=>1
        ]);
        $k->save();
        return redirect()->route('khuyenmais.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(KhuyenMai $khuyenmai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KhuyenMai $khuyenmai)
    {
        //dd($khuyenmai);
        return view('admin.khuyenmais.khuyenmai-edit', ['k'=>$khuyenmai]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKhuyenMaiRequest $request, KhuyenMai $khuyenmai)
    {
        if($request->restore == 1){
            KhuyenMai::where('id', $khuyenmai->id)->update([
                'trangthai'=>1
            ]);

            return redirect()->route('khuyenmais.index');
        }

        KhuyenMai::where('id', '=', $khuyenmai->id)->update([
            'mota'=>$request->mota,
            'mucgiam'=>$request->mucgiam,
            'giatoithieu'=>$request->giatoithieu,
            'hansudung'=>$request->hansudung,
            'trangthai'=>$request->trangthai,
        ]);
        $khuyenmai->save();
        return redirect()->route('khuyenmais.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KhuyenMai $khuyenmai)
    {
        $khuyenmai->fill([
            'trangthai'=>0,
            'thoigianxoa'=>Carbon::now()->toDateTimeString(),
        ]);
        $khuyenmai->save();
        return redirect()->route('khuyenmais.index');
    }
}
