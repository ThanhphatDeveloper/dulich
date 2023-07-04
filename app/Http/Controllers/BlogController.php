<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected function fixImage(Blog $u)
    {
        //1 hình bất kì để vào folder public/img
        if($u->anhdaidien && Storage::disk('public')->exists($u->anhdaidien)){
            $u->anhdaidien = Storage::url($u->anhdaidien);
        } else{
            $u->anhdaidien = '/img/test.gif';
        }
    }

    public function index()
    {
        $lst_user=User::all();
        $lst=Blog::search()->orderBy('updated_at','DESC')->paginate(10);
        foreach($lst as $u){
            $this->fixImage($u);
        }
        return view('admin.blogs.blog-index', compact('lst'), ['lst_user'=>$lst_user]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lst=User::all();
        return view('admin.blogs.blog-create', ['lst'=>$lst]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        //dd($request->image);
        $d = Blog::create([
            'tieude'=>$request->tieude,
            'noidung'=>$request->noidung,
            'anhdaidien'=>'',
            'user_id'=>$request->tacgia,
            'trangthai'=>1
        ]);
        $path = $request->image->store('upload/blog/'.$d->id,'public');
        $d->anhdaidien=$path;
        $d->save();

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $lst=User::all();
        return view('admin.blogs.blog-edit', ['lst'=>$lst, 'blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if($request->restore == 1){
            Blog::where('id', $blog->id)->update([
                'trangthai'=>1
            ]);

            return redirect()->route('blogs.index');
        }

        $path = $blog->anhdaidien;
        if($request->hasFile('image') && $request->image->isValid()){
            $path = $request->image->store('upload/blog/'.$blog->id, 'public');
        }

        if($request->tieude != $blog->tieude){
            $request->validate(
                [
                    'tieude' => ['unique:blogs'],
                ],
                [
                    'tieude.unique' => 'Tiêu đề đã tồn tại',
                ]
            );
        }

        Blog::where('id', $blog->id)->update([
            'tieude'=>$request->tieude,
            'noidung'=>$request->noidung,
            'anhdaidien'=>$path,
            'user_id'=>$request->tacgia,
            'trangthai'=>$request->trangthai
        ]);
        
        return redirect('admin/blogs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->fill([
            'trangthai'=>0,
            'thoigianxoa'=>Carbon::now()->toDateTimeString(),
        ]);
        $blog->save();
        return redirect()->route('blogs.index');
    }
}
