<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LichTrinh extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public function dia_diem(){
        return $this->belongsTo(DiaDiem::class);
    }

    public function tour(){
        return $this->belongsTo(Tour::class);
    }
}
