<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personnel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'date_naissance' => 'date',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function conges()
    {
        return $this->hasMany(Conge::class);
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }

    public function attributionEquipements()
    {
        return $this->hasMany(AttributionEquipement::class);
    }

    public function plaintes()
    {
        return $this->hasMany(Plainte::class, 'policier_id');
    }

    public function patrouilles()
    {
        return $this->belongsToMany(Patrouille::class, 'patrouille_personnel')
                    ->withTimestamps();
    }

    public function affaires()
    {
        return $this->hasMany(Affaire::class, 'enqueteur_id');
    }

    public function transferts()
    {
        return $this->belongsToMany(Transfert::class, 'personnel_transfert')
                    ->withTimestamps();
    }
}
