<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leerling extends Model
{
    use HasFactory;

    protected $fillable = [
        'voornaam',
        'achternaam',
        'geboortedatum',
        'diploma',
        'ouder_id',
    ];

    protected $primaryKey = 'leerling_id';
}
