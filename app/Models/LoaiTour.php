<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiTour extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public function tours(){
        return $this->hasMany(Tour::class);
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query=$query->where('loaitour', 'like', '%'.$key.'%');
        }

        return $query;
    }
}
