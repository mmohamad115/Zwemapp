<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zwem_Docent extends Model
{
    use HasFactory;

    protected $table = 'zwem_docenten';

    protected $primaryKey = 'zwem_docent_id';
    protected $fillable = [
        'voornaam',
        'achternaam',
        'user_id',
    ];

    public function groep()
    {
        return $this->belongsTo(Groep::class);
    }

    
}