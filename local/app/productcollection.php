<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productcollection extends Model
{
    protected $table = 'tb_product_collection';
    protected $primaryKey = 'collection_id';
    public $timestamps = true;
}
