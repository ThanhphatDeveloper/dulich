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
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    protected function fixImage(ImageTour $u)
    {
        //dd($u);
        //1 hình bất kì để vào folder public/img
        if($u->image && Storage::disk('public')->exists($u->image)){
            $u->image = Storage::url($u->image);
        } else{
            $u->image = '/img/test.gif';
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $a=Tour::find(1);
        // dd($a->loai_tour->loaitour);

        $lst=Tour::search()->orderBy('created_at','DESC')->paginate(10);
        $lst_diadiem=DiaDiem::all();
        return view('admin.tours.tour-index', compact('lst'), ['lst_diadiem'=>$lst_diadiem]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lst_img=ImageTour::all();
        $lst_dd=DiaDiem::all();
        $lst_loai_tour=LoaiTour::all();
        $lst_ncc=NhaCungCap::all();
        $lst_tg=ThoiGianTour::all();
        $lst_km=KhuyenMai::all();

        return view('admin.tours.tour-create',
        [
            'lst_img'=>$lst_img,
            'lst_dd'=>$lst_dd,
            'lst_loai_tour'=>$lst_loai_tour,
            'lst_ncc'=>$lst_ncc,
            'lst_tg'=>$lst_tg,
            'lst_km'=>$lst_km
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTourRequest $request)
    {
        //dd($request);

        $thoigian = ThoiGianTour::create([
            'songay'=>$request->ngay,
            'sodem'=>$request->dem,
        ]);

        $thoigian->save();

        $t = Tour::create([
            'tentour'=>$request->tentour,
            'gia'=>$request->gia,
            'mota'=>$request->mota,
            'ngaykhoihanh'=>$request->nkh,
            'phuongtien'=>$request->phuongtien,
            'loai_tour_id'=>$request->loaitour,
            'dia_diem_khoi_hanh_id'=>$request->dkh,
            'dia_diem_ket_thuc_id'=>$request->dkt,
            'nha_cung_cap_id'=>$request->ncc,
            'thoi_gian_id'=>$thoigian->id,
            'khuyen_mai_id'=>$request->khuyenmai,
            'trangthai'=>1,
        ]);

        $t->save();

        $image = ImageTour::create([
            'image'=>'',
            'tour_id'=>$t->id,
        ]);

        $path = $request->image->store('upload/imagetour/'.$image->id,'public');
        $image->image=$path;
        $image->save();

        return redirect()->route('tours.index');
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

        foreach($lst_img as $u){
            $this->fixImage($u);
        }

        return view('admin.tours.tour-show', ['t'=>$tour],
        [
            'lst_img'=>$lst_img,
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
        //dd($tour);
        return view('admin.tours.tour-edit', ['t'=>$tour]);
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
        $tour->fill([
            'trangthai'=> 0,
        ]);
        $tour->save();
        $tour->delete();
        return redirect()->route('tours.index');
    }
}
