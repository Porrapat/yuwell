<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class overview extends Model
{
    protected $table = 'tb_honor';
    protected $primaryKey = 'honor_id';
    public $timestamps = true;
}
