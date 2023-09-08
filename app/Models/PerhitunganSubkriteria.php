<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PerhitunganSubkriteria extends Model
{
    use HasFactory;

    public function subkriteria(): HasOne {
        return $this->hasOne(SubKriteria::class, 'id', 'id_subkriteria');
    }
}
