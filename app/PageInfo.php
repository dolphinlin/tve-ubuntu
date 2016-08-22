<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageInfo extends Model
{
    //
    protected $table = 'page_infos';
    protected $fillable = ['title', 'url'];
}
