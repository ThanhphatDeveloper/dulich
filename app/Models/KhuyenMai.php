<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KhuyenMai extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public function tours(){
        return $this->hasMany(Tour::class);
    }

    public function don_hangs(){
        return $this->hasMany(DonHang::class);
    }
}
