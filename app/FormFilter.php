<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormFilter extends Model
{
    protected $table = 'form_filters';
    protected $fillable = ['title'];
}
