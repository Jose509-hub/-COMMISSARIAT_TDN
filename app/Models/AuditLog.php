<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuditLog extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $fillable = [
        'user_id',
        'adresse_ip',
        'action',
        'modele_cible',
        'modele_id',
        'anciennes_valeurs',
        'nouvelles_valeurs',
        
    ];

    protected function casts(): array
    {
        return [
            'anciennes_valeurs' => 'array',
            'nouvelles_valeurs' => 'array',
            'created_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted(): void
    {
        static::updating(fn () => false);
        static::deleting(fn () => false);
    }

}
