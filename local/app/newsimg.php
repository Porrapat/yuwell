<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newsimg extends Model
{
    protected $table = 'tb_news_img';
    protected $primaryKey = 'img_news_id';
    public $timestamps = true;
}
