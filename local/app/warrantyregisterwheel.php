<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class warrantyregisterwheel extends Model
{
    protected $table = 'tb_warranty_wheel';
    protected $primaryKey = 'warranty_wheel_id';
    public $timestamps = true;
}
