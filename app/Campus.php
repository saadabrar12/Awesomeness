<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'Campus';
    protected $primaryKey = 'Campus_id';
    public $timestamps = false;
}
