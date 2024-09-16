<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zwem_Docent extends Model
{
    use HasFactory;

    protected $fillable = [
        'voornaam',
        'achternaam',
        'groep_id',
    ];
}
