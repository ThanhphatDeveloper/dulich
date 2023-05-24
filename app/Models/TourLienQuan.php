<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourLienQuan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public function blog(){
        return $this->belongsTo(Blog::class);
    }

    public function tour(){
        return $this->belongsTo(Tour::class);
    }
}
