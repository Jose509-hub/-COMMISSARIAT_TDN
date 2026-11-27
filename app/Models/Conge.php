<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conge extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'date_debut' => 'date',
            'date_fin' => 'date',
        ];
    }

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }

    public function commissaire()
    {
        return $this->belongsTo(Personnel::class, 'valide_par');
    }
}
