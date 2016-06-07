<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'Events';
    protected $primaryKey = 'Event_id';
    public $timestamps = false;
}
