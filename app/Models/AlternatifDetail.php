<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AlternatifDetail extends Model
{
    use HasFactory;

    public function alternatif(): HasOne {
        return $this->hasOne(Alternatif::class, 'id_alternatif', 'id');
    }

    public function kriteria(): HasOne {
        return $this->hasOne(Kriteria::class, 'id_kriteria', 'id');
    }
    
}
