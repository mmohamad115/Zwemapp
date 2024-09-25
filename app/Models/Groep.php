<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groep extends Model
{
    use HasFactory;

    protected $table = 'groepen';


    protected $fillable = [
        'groepNaam',
        'leerling_id',
        'zwem_docent_id',
        'zwemles_id',
    ];

    protected $primaryKey = 'groep_id';
}
