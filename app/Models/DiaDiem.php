<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiaDiem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public function lichtrinhs(){
        return $this->hasMany(LichTrinh::class);
    }
}
