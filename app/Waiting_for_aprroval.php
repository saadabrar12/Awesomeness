<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waiting_for_aprroval extends Model
{
    protected $table = 'Waiting_for_aprroval';
    protected $primaryKey = 'Request_id';
    public $timestamps = false;
}
