<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productsize extends Model
{
    protected $table = 'tb_product_size';
    protected $primaryKey = 'size_id';
    public $timestamps = true;
}
