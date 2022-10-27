<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sector extends Model
{
    protected $table = 'tb_sector';
    protected $primaryKey = 'sector_id';
    public $timestamps = false;
}
