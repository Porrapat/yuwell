<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class homebanner extends Model
{
    protected $table = 'tb_benner';
    protected $primaryKey = 'home_banner_id';
    public $timestamps = true;
}
