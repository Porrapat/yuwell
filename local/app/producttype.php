<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producttype extends Model
{
    protected $table = 'tb_product_type';
    protected $primaryKey = 'type_id';
    public $timestamps = true;
}
