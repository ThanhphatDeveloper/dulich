<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonHang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public function khuyen_mai(){
        return $this->belongsTo(KhuyenMai::class);
    }

    public function thanh_toan(){
        return $this->belongsTo(ThanhToan::class);
    }

    public function khach_hangs(){
        return $this->hasMany(KhachHang::class);
    }

    public function tour(){
        return $this->belongsTo(Tour::class);
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query=$query->where('ten', 'like', '%'.$key.'%')
            ->orWhere('email', 'like', '%'.$key.'%')
            ->orWhere('sdt', 'like', '%'.$key.'%');
        }

        return $query;
    }
}
