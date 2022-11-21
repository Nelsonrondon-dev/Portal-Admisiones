<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Step extends Model
{
    protected $fillable = ['user_id','step1', 'step2', 'step3','step4','step4','step5'];


    public function user(){
        return $this->belongsTo(User::class);
    }

}


