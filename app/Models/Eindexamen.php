<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eindexamen extends Model
{
    use HasFactory;

    protected $table = 'eindexamen';

    protected $fillable = [
        'examen_naam',
        'beschrijving',
        'duur',
        'tijdstip',
    ];
}
