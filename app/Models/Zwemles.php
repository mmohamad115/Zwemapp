<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zwemles extends Model
{
    use HasFactory;

    protected $table = 'zwemlessen';

    protected $primaryKey = 'zwemles_id';

    protected $fillable = [
        'naam',
        'beschrijving',
        'duurtijd',
        'datum',
        'tijd',
    ];

    public function groepen()
    {
        return $this->belongsToMany(Leerling::class, 'inschrijvingen', 'zwemles_id', 'leerling_id');
    }

    public function leerlingen()
    {
        return $this->belongsToMany(Leerling::class, 'inschrijvingen', 'zwemles_id', 'leerling_id');
    }
}
