<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $table = 'Member';
    protected $primaryKey = 'Member_id';
    public $timestamps = false;
}
