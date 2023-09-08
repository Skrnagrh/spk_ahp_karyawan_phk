<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubkriteriaValid extends Model
{
    use HasFactory;

    public function kriteria(): BelongsTo {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id');
    }
}
