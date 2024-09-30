<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = [
        'content',
        'aanmaakdatum',
        'leerling_id',
        'zwem_docent_id',
    ];

    protected $primaryKey = 'feedback_id';

    public function leerling()
    {
        return $this->belongsTo(Leerling::class, 'leerling_id');
    }

    public function zwemDocent()
    {
        return $this->belongsTo(Zwem_Docent::class, 'zwem_docent_id');
    }
}
