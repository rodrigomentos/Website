<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Coment;
use App\User;
class Post extends Model
{
      protected $table = 'post';

      public function user()
      {
          return $this->belongsTo('App\User');
      }

      public function coments()
      {
          return $this->hasMany('App\Coment');
      }



        public function username($user_id){

          $user = User::where("id",$user_id)->first();
            return $user->name." ".$user->lastname ;
        }
}
