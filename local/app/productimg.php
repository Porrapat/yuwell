<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productimg extends Model
{
    protected $table = 'tb_product_img';
    protected $primaryKey = 'img_id';
    public $timestamps = true;
}
