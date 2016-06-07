<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'Department';
    protected $primaryKey = 'Department_id';
    public $timestamps = false;

}
