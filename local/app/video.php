<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $table = 'tb_video';
    protected $primaryKey = 'video_id';
    public $timestamps = true;
}
