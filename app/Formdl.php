<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formdl extends Model
{
    protected $table = 'formdls';
    protected $fillable = ['title', 'name', 'url', 'filter'];  
}
