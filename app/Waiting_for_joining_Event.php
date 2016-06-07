<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waiting_for_joining_Event extends Model
{
    protected $table = 'Waiting_for_joining_event';
    protected $primaryKey = 'Request_id';
    public $timestamps = false;
}
