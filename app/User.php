<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\Coment;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function sex()
    {
      return $this->belongsTo('App\Gender', 'gender', 'id');
    }

    public function count_my_posts(){

      return Post::where("user_id",$this->id)->where("status",0)->count();
    }

    public function count_my_coments(){

      return Coment::where("user_id",$this->id)->where("status",0)->count();
    }


}
