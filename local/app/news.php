<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $table = 'tb_news';
    protected $primaryKey = 'news_id';
    public $timestamps = true;
}
