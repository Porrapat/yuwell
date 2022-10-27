<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    protected $table = 'tb_contacts';
    protected $primaryKey = 'contact_id';
    public $timestamps = true;
}
