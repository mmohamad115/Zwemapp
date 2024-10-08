<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leerling extends Model
{
    use HasFactory;

    protected $table = 'leerlingen';

    protected $fillable = [
        'voornaam',
        'achternaam',
        'geboortedatum',
        'diploma',
        'ouder_id',
        'lessons_completed', // Add this line
    ];

    protected $primaryKey = 'leerling_id';


    public function groep()
    {
        return $this->hasOne(Groep::class, 'leerling_id', 'leerling_id');
    }


    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'leerling_id', 'leerling_id');
    }

}
