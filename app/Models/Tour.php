<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public function loai_tour(){
        return $this->belongsTo(LoaiTour::class);
    }

    public function ncc_tour(){
        return $this->belongsTo(NhaCungCap::class);
    }

    public function khuyenmai_tour(){
        return $this->belongsTo(KhuyenMai::class);
    }

    public function tour_lien_quan(){
        return $this->hasMany(TourLienQuan::class);
    }

    public function image_tour(){
        return $this->hasMany(ImageTour::class);
    }

    public function lichtrinhs(){
        return $this->hasMany(LichTrinh::class);
    }
}
