<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groep extends Model
{
  use HasFactory;

  protected $table = 'groepen';
  protected $primaryKey = 'groep_id';

  protected $fillable = [
    'groep_id',
    'groepNaam',
    'zwem_docent_id',
  ];

  public function zwemles()
  {
    return $this->belongsToMany(Zwemles::class, 'inschrijvingen', 'groep_id', 'zwemles_id');
  }

  public function leerlingen()
  {
    return $this->hasMany(Leerling::class, 'leerling_id');
  }

  public function zwemdocent()
  {
    return $this->belongsTo(Zwem_Docent::class, 'zwem_docent_id');
  }
}
