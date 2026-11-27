<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Affectation extends Model
{
    use HasFactory;

    protected $fillable = [
            'personnel_id',
            'unite_ou_service',
            'poste',
            'date_debut',
            'date_fin',
            'est_actuelle',
    ];

    protected function casts(): array
    {
        return [
            'date_debut' => 'date',
            'date_fin' => 'date',
            'est_actuelle' => 'boolean',
        ];
    }
    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
