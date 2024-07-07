<?php

namespace App\Models\Trofeu;

use App\Models\Campus\Campus;
use App\Models\Modalidades\Modalidades;
use App\Models\StatusTrofeu\StatusTrofeu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trofeu extends Model
{
  use HasFactory;

  protected $fillable = [
    'nome',
    'campus_id',
    'ano',
    'colocacao',
    'status_id',
    'modalidade_id',
    'historia',
    'obs',
  ];

  public function campus()
  {
    return $this->hasOne(Campus::class, 'id', 'campus_id');
  }

  public function status()
  {
    return $this->hasOne(StatusTrofeu::class, 'id', 'status_id');
  }

  public function modalidade()
  {
    return $this->hasOne(Modalidades::class, 'id', 'modalidade_id');
  }

  public function getRelacionadosAttribute()
  {
    $relacionados = Trofeu::where('modalidade_id', $this->modalidade_id)->where('id', '!=', $this->id)->get();

    return $relacionados->count() ? $relacionados : collect();
  }

}
