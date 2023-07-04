<?php

namespace App\Http\Controllers;

use App\Models\NhaCungCap;
use App\Http\Requests\StoreNhaCungCapRequest;
use App\Http\Requests\UpdateNhaCungCapRequest;
use Carbon\Carbon;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst=NhaCungCap::search()->orderBy('updated_at','DESC')->paginate(10);
        $lst_ncc=NhaCungCap::all();

        return view('admin.nhacungcaps.nhacungcap-index', compact('lst'), ['ncc'=>$lst_ncc]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.nhacungcaps.nhacungcap-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNhaCungCapRequest $request)
    {
        $n = NhaCungCap::create([
            'nhacungcap'=>$request->nhacungcap,
            'trangthai'=>1
        ]);
        $n->save();
        return redirect()->route('nhacungcaps.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(NhaCungCap $nhacungcap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NhaCungCap $nhacungcap)
    {
        return view('admin.nhacungcaps.nhacungcap-edit', ['n'=>$nhacungcap]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNhaCungCapRequest $request, NhaCungCap $nhacungcap)
    {
        if($request->restore == 1){
            NhaCungCap::where('id', $nhacungcap->id)->update([
                'trangthai'=>1
            ]);

            return redirect()->route('nhacungcaps.index');
        }

        if( $request->nhacungcap != $nhacungcap->nhacungcap){
            $request->validate(
                [
                    'nhacungcap' => ['unique:nha_cung_caps'],
                ],
                [
                    'nhacungcap.unique' => 'Nhà cung cấp đã tồn tại'
                ]
            );
        }

        $nhacungcap->fill([
            'nhacungcap'=>$request->nhacungcap,
            'trangthai'=>$request->trangthai,
        ]);
        $nhacungcap->save();
        return redirect()->route('nhacungcaps.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NhaCungCap $nhacungcap)
    {
        $nhacungcap->fill([
            'trangthai'=>0,
            'thoigianxoa'=>Carbon::now()->toDateTimeString(),
        ]);
        $nhacungcap->save();
        return redirect()->route('nhacungcaps.index');
    }
}
