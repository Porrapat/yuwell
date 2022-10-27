<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    protected $table = 'tb_about';
    protected $primaryKey = 'about_us_id';
    public $timestamps = true;
}
