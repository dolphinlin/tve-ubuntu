<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Netres extends Model
{
    //
    protected $table = 'netres';
    protected $fillable = ['name', 'url', 'filter'];
}
