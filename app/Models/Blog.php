<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function tour_lien_quan(){
        return $this->hasMany(TourLienQuan::class);
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query=$query->where('tieude', 'like', '%'.$key.'%');
        }

        return $query;
    }
}
