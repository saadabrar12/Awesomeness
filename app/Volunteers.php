<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteers extends Model
{
    protected $table = 'Volunteer';
    protected $primaryKey = 'Volunteer_id';
    public $timestamps = false;

}
