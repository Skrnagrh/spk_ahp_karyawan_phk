<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Perhitungan extends Model
{
    use HasFactory;

    public function kriteria() : HasOne {
        return $this->hasOne(Kriteria::class, 'id_kriteria', 'id');
    }
}
