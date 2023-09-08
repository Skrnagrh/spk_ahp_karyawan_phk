<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kriteria extends Model
{
    use HasFactory;

    public function subkriterias() : HasMany {
        return $this->hasMany(SubKriteria::class, 'id_kriteria', 'id');
    }

    public function perhitungans() : HasMany {
        return $this->hasMany(Perhitungan::class, 'id_kriteria', 'id');
    }

    public function nilaiprioritaskriteria() : HasOne {
        return $this->hasOne(NilaiPrioritasKriteria::class, 'id_kriteria', 'id');
    }

    public function subkriteriavalid() : HasOne {
        return $this->hasOne(SubkriteriaValid::class, 'id_kriteria', 'id');
    }

    public function alternatifdetails() : HasMany {
        return $this->HasMany(AlternatifDetail::class, 'id_kriteria', 'id');
    }   
}
