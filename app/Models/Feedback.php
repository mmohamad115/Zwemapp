<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = [
        'leerling_id',
        'zwem_docent_id',
        'content',
        'aanmaakdatum',
    ];

    public function leerling()
    {
        // return $this->belongsTo(Leerling::class);
    }


    public function zwemDocent()
    {
        // return $this->belongsTo(ZwemDocent::class);
    }
}
