<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $table = 'Participation';
    protected $primaryKey = 'Participation_id';
    public $timestamps = false;
}
