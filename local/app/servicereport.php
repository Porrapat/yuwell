<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicereport extends Model
{
    protected $table = 'tb_service_report';
    protected $primaryKey = 'service_report_id';
    public $timestamps = false;

    public function repair_status()
    {
        return $this->belongsTo(repairstatus::class, 'service_report_repair_status_id');
    }

    public function service_report_images()
    {
        return $this->hasMany(servicereportimage::class, 'service_report_id');
    }
}
