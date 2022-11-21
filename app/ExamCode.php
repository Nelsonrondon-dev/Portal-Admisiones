<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ExamCode extends Model
{
    protected $fillable = ['user_id', 'code_id'];


    public function user(){

        return $this->belongsTo(User::class);
    }
}
