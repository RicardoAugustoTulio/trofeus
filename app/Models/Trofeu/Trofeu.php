<?php

namespace App\Models\Trofeu;

use App\Models\Campus\Campus;
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
  ];

  public function campus()
  {
    return $this->hasOne(Campus::class);
  }
  public function status()
  {
    return $this->hasOne(StatusTrofeu::class);
  }

}
