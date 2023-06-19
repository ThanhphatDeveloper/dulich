<?php

namespace App\Http\Controllers;

use App\Models\DiaDiem;
use App\Http\Requests\StoreDiaDiemRequest;
use App\Http\Requests\UpdateDiaDiemRequest;

class DiaDiemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst=DiaDiem::search()->orderBy('created_at','DESC')->paginate(10);
        return view('admin.diadiems.diadiem-index', compact('lst'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.diadiems.diadiem-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiaDiemRequest $request)
    {
        //dd($request);
        $d = DiaDiem::create([
            'diadiem'=>$request->diadiem,
            'trangthai'=>1
        ]);
        $d->save();
        return redirect()->route('diadiems.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DiaDiem $diadiem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DiaDiem $diadiem)
    {
        return view('admin.diadiems.diadiem-edit', ['d'=>$diadiem]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiaDiemRequest $request, DiaDiem $diadiem)
    {
        if( $request->diadiem != $diadiem->diadiem){
            $request->validate(
                [
                    'diadiem' => ['unique:dia_diems'],
                ],
                [
                    'diadiem.unique' => 'Địa điểm đã tồn tại'
                ]
            );
        }

        $diadiem->fill([
            'diadiem'=>$request->diadiem,
            'trangthai'=>$request->trangthai,
        ]);
        $diadiem->save();
        return redirect()->route('diadiems.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiaDiem $diadiem)
    {
        $diadiem->fill([
            'trangthai'=>0,
        ]);
        $diadiem->save();
        return redirect()->route('diadiems.index');
    }
}
