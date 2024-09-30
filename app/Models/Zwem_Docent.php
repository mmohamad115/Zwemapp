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
        'user_id',
    ];

    protected $primaryKey = 'zwem_docent_id';

}
    