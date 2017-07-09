<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
  protected $table = 'coments';

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function post()
  {
      return $this->belongsTo('App\Post');
  }
}
