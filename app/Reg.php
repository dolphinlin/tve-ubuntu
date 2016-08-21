<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reg extends Model
{
    //
    protected $table = 'regs';
    protected $fillable = ['name', 'day', 'number', 'filter'];
}
