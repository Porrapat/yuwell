<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class repairstatus extends Model
{
    protected $table = 'tb_repair_status';
    protected $primaryKey = 'repair_status_id';
    public $timestamps = false;
}
