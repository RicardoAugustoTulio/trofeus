<?php

namespace App\Models\Modalidades;

use App\Models\Trofeu\Trofeu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidades extends Model
{
  use HasFactory;

  protected $table = 'modalidades';
  protected $fillable = [
    'nome',
    'descricao'
  ];

  public function trofeus()
  {
    return $this->belongsTo(Trofeu::class,'id','modalidade_id');
  }
}
