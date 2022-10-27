<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class timeline extends Model
{
    protected $table = 'tb_timeline';
    protected $primaryKey = 'timeline_id';
    public $timestamps = false;
}
