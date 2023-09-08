<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubKriteria extends Model
{
    use HasFactory;

    public function kriteria() : HasOne {
        return $this->hasOne(Kriteria::class, 'id', 'id_kriteria');
    }

    public function perhitungansubkriterias(): HasMany {
        return $this->hasMany(PerhitunganSubkriteria::class, 'id_subkriteria', 'id');
    }
}
