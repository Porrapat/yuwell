<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class warrantyregistertires extends Model
{
    protected $table = 'tb_warranty_tires';
    protected $primaryKey = 'warranty_tires_id';
    public $timestamps = false;
}
