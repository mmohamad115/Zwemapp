<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groep extends Model
{
    use HasFactory;

    protected $table = 'groepen';

    protected $fillable = [
        // Add your fillable fields here
        'zwemles_id',
    ];

    public function zwemles()
    {
        return $this->belongsTo(Zwemles::class, 'zwemles_id', 'zwemles_id');
    }
}
