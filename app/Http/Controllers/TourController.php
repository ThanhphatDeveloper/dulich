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
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        $lst=Tour::search()->orderBy('updated_at','DESC')->paginate(10);
        $lst_diadiem=DiaDiem::all();

        

        foreach($lst as $t){
            $t->ngaykhoihanh = Carbon::parse($t->ngaykhoihanh)->format('Y-m-d\TH:i');
        }

        //dd($lst[0]->ngaykhoihanh);

        return view('admin.tours.tour-index', compact('lst'), ['lst_diadiem'=>$lst_diadiem]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lst_img=ImageTour::where('trangthai', '=', 1)->get();
        $lst_dd=DiaDiem::where('trangthai', '=', 1)->get();
        $lst_loai_tour=LoaiTour::where('trangthai', '=', 1)->get();
        $lst_ncc=NhaCungCap::where('trangthai', '=', 1)->get();
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
        //dd($request->file('image'));

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
            'trangthai'=>1,
        ]);

        $t->save();

        // $image = ImageTour::create([
        //     'image'=>'',
        //     'tour_id'=>$t->id,
        // ]);

        // $path = $request->image->store('upload/imagetour/'.$image->id,'public');
        // $image->image=$path;
        // $image->save();

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
        $lst_img=ImageTour::where('tour_id', '=', $tour->id)->get();
        $lst_dd=DiaDiem::all();
        $lst_loai_tour=LoaiTour::all();
        $lst_ncc=NhaCungCap::all();
        $lst_tg=ThoiGianTour::where('id', '=', $tour->thoi_gian_id)->first();
        $lst_km=KhuyenMai::all();

        //dd($tour->ngaykhoihanh);

        foreach($lst_img as $u){
            $this->fixImage($u);
        }

        return view('admin.tours.tour-edit', ['t'=>$tour],[
            'lst_img'=>$lst_img,
            'lst_dd'=>$lst_dd,
            'lst_loai_tour'=>$lst_loai_tour,
            'lst_ncc'=>$lst_ncc,
            'lst_tg'=>$lst_tg,
            'lst_km'=>$lst_km
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTourRequest $request, Tour $tour)
    {

        if( $request->tentour != $tour->tentour){
            $request->validate(
                [
                    'tentour'=>['unique:tours']
                ],
                [
                    'tentour.unique' => 'Tên tour đã tồn tại',
                ]
            );
        }

        $thoigian = ThoiGianTour::where('id', $tour->thoi_gian_id)->update([
            'songay'=>$request->ngay,
            'sodem'=>$request->dem,
        ]);

        //dd($thoigian);

        $t = Tour::where('id', $tour->id)->update([
            'tentour'=>$request->tentour,
            'gia'=>$request->gia,
            'mota'=>$request->mota,
            'ngaykhoihanh'=>$request->nkh,
            'phuongtien'=>$request->phuongtien,
            'loai_tour_id'=>$request->loaitour,
            'dia_diem_khoi_hanh_id'=>$request->dkh,
            'dia_diem_ket_thuc_id'=>$request->dkt,
            'nha_cung_cap_id'=>$request->ncc,
            'thoi_gian_id'=>$thoigian,
            'trangthai'=>1,
        ]);

        // $image = ImageTour::where('id', $tour->thoi_gian_id)->update([
        //     'image'=>'',
        //     'tour_id'=>$t->id,
        // ]);

        // $path = $request->image->store('upload/imagetour/'.$image->id,'public');
        // $image->image=$path;
        // $image->save();

        return redirect()->route('tours.index');
    }

    public function update_trangthai(Request $request)
    {
        //dd($request->id);
        Tour::where('id', $request->id)->update([
            'trangthai'=>1
        ]);

        return redirect()->route('tours.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        $tour->fill([
            'trangthai'=> 0,
            'thoigianxoa'=>Carbon::now()->toDateTimeString(),
        ]);
        $tour->save();
        return redirect()->route('tours.index');
    }
}
