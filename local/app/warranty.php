<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class warranty extends Model
{
    protected $table = 'tb_warranty';
    protected $primaryKey = 'warranty_id';
    public $timestamps = false;

    public function serialnumber()
    {
        return $this->belongsTo(serialnumber::class, 'warranty_serial_number', 'serial_number_no');
    }
}
