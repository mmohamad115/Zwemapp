<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouder extends Model
{
    use HasFactory;

    protected $fillable = [
        'voornaam',
        'achternaam',
        'user_id',
    ];

    protected $primaryKey = 'ouder_id';
    
    public function leerlingen()
    {
        return $this->hasMany(Leerling::class, 'ouder_id');
    }
}
