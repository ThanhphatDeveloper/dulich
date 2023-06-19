<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class NhaCungCap extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function ncc_tours(){
        return $this->morphMany(Tour::class, 'tourable');
    }
    // public function ncc_tours(){
    //     return $this->hasMany(Tour::class);
    // }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query=$query->where('nhacungcap', 'like', '%'.$key.'%');
        }

        return $query;
    }
}
