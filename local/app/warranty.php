<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class warranty extends Model
{
    protected $table = 'tb_warranty';
    protected $primaryKey = 'warranty_id';
    public $timestamps = true;
}
