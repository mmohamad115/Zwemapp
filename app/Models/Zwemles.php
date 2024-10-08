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
        'tijdstip',
    ];

    public function groepen()
    {
        return $this->belongsToMany(Groep::class, 'inschrijvingen', 'zwemles_id', 'groep_id');
    }
}
