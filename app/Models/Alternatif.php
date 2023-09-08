<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alternatif extends Model
{
    use HasFactory;

    public function alternatifdetails(): HasMany {
        return $this->hasMany(AlternatifDetail::class, 'id_alternatif', 'id');
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
