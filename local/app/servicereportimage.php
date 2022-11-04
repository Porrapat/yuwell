<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicereportimage extends Model
{
    protected $table = 'tb_service_report_image';
    protected $primaryKey = 'service_report_image_id';
    public $timestamps = false;

    public function service_report()
    {
        return $this->belongsTo(servicereport::class, 'service_report_id');
    }
}
