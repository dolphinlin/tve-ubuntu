<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = array('title', 'description');

    public function photos(){

      return $this->hasMany('App\Photo');
    }
}
