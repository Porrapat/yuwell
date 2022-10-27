<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class certificates extends Model
{
    protected $table = 'tb_certificates';
    protected $primaryKey = 'certificates_id';
    public $timestamps = true;
}
