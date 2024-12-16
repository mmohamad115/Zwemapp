<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prijs extends Model
{
    use HasFactory;

    protected $table = 'prijzen';
    protected $primaryKey = 'prijs_id';

    protected $fillable = [
        'naam',
        'beschrijving'
    ];

    public function leerlingen()
    {
        return $this->belongsToMany(Leerling::class, 'eindexamen_leerling', 'prijs_id', 'leerling_id');
    }

    public function eindexamens()
    {
        return $this->belongsToMany(Eindexamen::class, 'eindexamen_leerling', 'prijs_id', 'eindexamen_id');
    }
}