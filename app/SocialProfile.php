<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class SocialProfile extends Model
{

    protected $fillable = ['user_id', 'social_id', 'social_name', 'social_avatar'];

    //relacion uno a mucho inversa

    public function user(){

        return $this->belongsTo(User::class);
    }
}
