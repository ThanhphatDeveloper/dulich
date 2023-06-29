<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KhachHang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public function user(){
        return $this->belongsTo(Blog::class);
    }

    public function don_hang(){
        return $this->belongsTo(DonHang::class);
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query=$query->where('ho', 'like', '%'.$key.'%')
            ->orWhere('ten', 'like', '%'.$key.'%')
            ->orWhere('sdt', 'like', '%'.$key.'%');
        }

        return $query;
    }
}
