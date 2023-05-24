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
}
