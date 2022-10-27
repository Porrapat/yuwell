<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'tb_product';
    protected $primaryKey = 'product_id';
    public $timestamps = true;
}
