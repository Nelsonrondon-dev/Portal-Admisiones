<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id','title', 'start_date', 'end_date','start_date_espana'];

}
