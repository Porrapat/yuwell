<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serialnumber extends Model
{
    protected $table = 'tb_serial_number';
    protected $primaryKey = 'serial_number_id';
    public $timestamps = false;
}
