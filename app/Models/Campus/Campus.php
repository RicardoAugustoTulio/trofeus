<?php

namespace App\Models\Campus;

use App\Models\Trofeu\Trofeu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
  use HasFactory;

  protected $table = 'campus';
  protected $fillable = [
    'nome',
    'sigla',
    'descricao'
  ];

  public function trofeus()
  {
    return $this->belongsToMany(Trofeu::class);
  }
}
