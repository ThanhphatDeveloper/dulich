<?php

namespace App\Http\Controllers;

use App\Models\LoaiTour;
use App\Http\Requests\StoreLoaiTourRequest;
use App\Http\Requests\UpdateLoaiTourRequest;
use Carbon\Carbon;

class LoaiTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst=LoaiTour::search()->orderBy('created_at','DESC')->paginate(10);
        return view('admin.loaitours.loaitour-index', compact('lst'));
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
    public function show(LoaiTour $loaitour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoaiTour $loaitour)
    {
        return view('admin.loaitours.loaitour-edit', ['l'=>$loaitour]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoaiTourRequest $request, LoaiTour $loaitour)
    {
        //dd($request);

        if( $request->loaitour != $loaitour->loaitour){
            $request->validate(
                [
                    'loaitour' => ['unique:loai_tours'],
                ],
                [
                    'loaitour.unique' => 'Loại tour đã tồn tại'
                ]
            );
        }

        $loaitour->fill([
            'loaitour'=>$request->loaitour,
        ]);
        $loaitour->save();
        return redirect()->route('loaitours.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoaiTour $loaitour)
    {
        $loaitour->fill([
            'trangthai'=>0,
            'thoigianxoa'=>Carbon::now()->toDateTimeString(),
        ]);
        $loaitour->save();
        return redirect()->route('loaitours.index');
    }
}
