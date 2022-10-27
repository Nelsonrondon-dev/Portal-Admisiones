<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Master extends Model
{
    
    protected $table = 'masters';


    protected $fillable = [
        'name', 'codigo', 'url', 'imagen_banner_g','imagen_banner_p','folleto'
    ];



    public function users()
    {
        return $this->belongsToMany(User::class);
    }





}
