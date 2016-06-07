<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_type extends Model
{
    protected $table = 'Event_type';
    protected $primaryKey = 'Event_type_id';
    public $timestamps = false;
}
