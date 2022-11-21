<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Booking extends Model
{
    protected $fillable = ['user_id','title', 'start_date', 'end_date','start_date_espana', 'zona_horaria'];

    public function user(){

        return $this->belongsTo(User::class);
    }

}
