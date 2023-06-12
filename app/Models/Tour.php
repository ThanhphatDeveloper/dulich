<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Tour extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function tourable(): MorphTo{
        return $this->morphTo();
    }

    public function loai_tour(){
        return $this->belongsTo(LoaiTour::class);
    }

    // public function ncc_tour(){
    //     return $this->hasMany(NhaCungCap::class);
    // }

    // public function khuyenmai_tour(){
    //     return $this->hasMany(KhuyenMai::class);
    // }

    // public function diadiem_tour(){
    //     return $this->hasMany(DiaDiem::class);
    // }

    // public function thoigian_tour(){
    //     return $this->hasMany(ThoiGianTour::class);
    // }
    
    public function tour_lien_quan(){
        return $this->hasMany(TourLienQuan::class);
    }

    public function image_tour(){
        return $this->hasMany(ImageTour::class);
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query=$query->where('tentour', 'like', '%'.$key.'%');
        }

        return $query;
    }
}
