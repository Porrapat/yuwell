<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    protected $table = 'tb_services';
    protected $primaryKey = 'service_id';
    public $timestamps = true;
}
