<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NetresFilter extends Model
{
  protected $table = 'netres_filters';
  protected $fillable = ['title'];
}
