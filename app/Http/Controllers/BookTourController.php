<?php

namespace App\Http\Controllers;

use App\Models\BookTour;
use App\Models\KhuyenMai;
use App\Models\Tour;
use App\Models\LoaiTour;
use App\Models\ImageTour;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookTourRequest;
use App\Http\Requests\UpdateBookTourRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class BookTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd($key);
        // $lt = LoaiTour::where('loaitour', $loaitour)->first();

        $lst = Tour::search()->where('trangthai', 1)->orderBy('updated_at','DESC')->paginate(6);
        
        $lst_img = ImageTour::all();
        
        return view('customer.list-tour', compact('lst'), ['lst_img'=>$lst_img]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($key)
    {
        dd($key);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookTourRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //dd(Tour::where('tentour', Str::title(str_replace('-', ' ', $tentour)))->exists());
        // $tentour = Str::title(str_replace('-', ' ', $tentour));
        // $tentour = Str::of($tentour)->trim();
        // dd(Tour::where('tentour', $tentour)->exists());
        //dd(Tour::where('tentour', Str::title(str_replace('-', ' ', $tentour)))->get());
        $t = Tour::where('slug', $slug)->first();
        //dd($tentour);
        $id = $t->id;

        $tour = Tour::where('id', $id)->first();
        $lst_km = KhuyenMai::all();
        $lst_img = ImageTour::where('tour_id', $id)->orderBy('updated_at','DESC')->take(12)->get();

        //dd($lst_img);
        
        return view('customer.tour-detail', ['tour' => $tour, 'lst_img' => $lst_img, 'lst_km' => $lst_km]);
    }

    public function show_tour($id)
    {
        dd($id);
        // $tentour = Str::title(str_replace('-', ' ', $tentour));
        // $tentour = Str::of($tentour)->trim();
        // dd(Tour::where('tentour', $tentour)->exists());
        //dd(Tour::where('tentour', Str::title(str_replace('-', ' ', $tentour)))->get());
        // $t = Tour::where('id', $id)->first();
        // dd($t);
        // $id = $t->id;

        $tour = Tour::where('id', $id)->first();
        $lst_km = KhuyenMai::all();
        $lst_img = ImageTour::where('tour_id', $id)->orderBy('updated_at','DESC')->take(12)->get();

        //dd($lst_img);
        
        return view('customer.tour-detail', ['tour' => $tour, 'lst_img' => $lst_img, 'lst_km' => $lst_km]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($key)
    {
        $l = LoaiTour::where('loaitour', $key)->first();
        $id = $l->id;
        $lst = Tour::search()->where('trangthai', 1)->where('loai_tour_id', $id)->orderBy('updated_at','DESC')->paginate(6);
        
        $lst_img = ImageTour::all();
        
        return view('customer.list-tour', compact('lst'), ['lst_img'=>$lst_img]);
    }

    public function type($loai)
    {
        $l = LoaiTour::where('loaitour', $loai)->first();
        $id = $l->id;
        $lst = Tour::search()->where('trangthai', 1)->where('loai_tour_id', $id)->orderBy('updated_at','DESC')->paginate(6);
        
        $lst_img = ImageTour::all();
        
        return view('customer.list-tour', compact('lst'), ['lst_img'=>$lst_img]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookTourRequest $request, BookTour $bookTour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookTour $bookTour)
    {
        //
    }
}
