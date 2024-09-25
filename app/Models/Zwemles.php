<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zwemles extends Model
{
    use HasFactory;

    protected $table = 'zwemlessen';

    protected $fillable = [
        'naam',
        'beschrijving',
        'duurtijd',
        'tijdstip',
    ];

    protected $primaryKey = 'zwemles_id';

    // Add this relationship
    public function groepen()
    {
        return $this->hasMany(Groep::class, 'zwemles_id', 'zwemles_id');
    }
}
