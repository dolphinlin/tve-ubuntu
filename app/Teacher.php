<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = ['name', 
    						'title', 
    						'position', 
    						'edulevel', 
    						'office', 
    						'communication', 
    						'email', 
    						'expertise', 
    						'tecwri', 
    						'pic',
    						'sort'];

}
