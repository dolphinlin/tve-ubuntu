<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postfiles extends Model
{
    //
    protected $table = 'postfiles';
    protected $fillable = ['postid', 'path'];
}
