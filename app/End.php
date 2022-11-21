<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class End extends Model
{
    protected $fillable = ['user_id','curriculum', 'name_1', 'lasname_1', 'phone_1', 'alumno_eadic_1', 'name_2', 'lasname_2', 'phone_2', 'alumno_eadic_2'];



    public function user(){

        return $this->belongsTo(User::class);
    }

}
