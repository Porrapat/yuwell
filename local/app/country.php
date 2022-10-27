<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $table = 'tb_country';
    protected $primaryKey = 'country_id';
    public $timestamps = false;
}
