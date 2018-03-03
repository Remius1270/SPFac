<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
  protected $table = "rdv";
  
  public $timestamps = false;
   
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
