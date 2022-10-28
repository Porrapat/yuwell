<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicereport extends Model
{
    protected $table = 'tb_service_report';
    protected $primaryKey = 'service_report_id';
    public $timestamps = false;
}
