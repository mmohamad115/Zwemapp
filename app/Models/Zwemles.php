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
}
