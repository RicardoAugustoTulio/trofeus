<?php

namespace App\Models\StatusTrofeu;

use App\Models\Trofeu\Trofeu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTrofeu extends Model
{
    use HasFactory;
    protected $fillable = [
      'nome',
      'cor',
    ];

  public function trofeus()
  {
    return $this->belongsTo(Trofeu::class,'id','status_id');
  }
}
