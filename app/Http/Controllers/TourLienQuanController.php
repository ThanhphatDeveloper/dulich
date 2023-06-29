<?php

namespace App\Http\Controllers;

use App\Models\TourLienQuan;
use App\Models\Tour;
use App\Models\Blog;
use App\Http\Requests\StoreTourLienQuanRequest;
use App\Http\Requests\UpdateTourLienQuanRequest;
use Illuminate\Http\Request;

class TourLienQuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lst_blog=Blog::all();
        $lst_tour=Tour::search()->get();
        $lst=TourLienQuan::where('blog_id', '=', $request->id)->orderBy('created_at','DESC')->paginate(10);
        return view('admin.blogs.tour-lien-quan', compact('lst'),
        [
            'lst_blog'=>$lst_blog,
            'lst_tour'=>$lst_tour,
            'blog_id'=>$request->id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTourLienQuanRequest $request)
    {
        //dd($request);
        $d = TourLienQuan::create([
            'blog_id'=>$request->blog_id,
            'tour_id'=>$request->tour_id,
            'trangthai'=>1
        ]);
        
        $d->save();

        return redirect('/admin/tourlienquans?id='.$request->blog_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(TourLienQuan $tourLienQuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TourLienQuan $tourLienQuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTourLienQuanRequest $request, TourLienQuan $tourLienQuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TourLienQuan $tourlienquan)
    {
        $tourlienquan->delete();
        return redirect('/admin/tourlienquans?id='.$tourlienquan->blog_id);
    }
}
