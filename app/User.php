<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\SocialProfile;
use App\ExamCode;
use App\RelacionUserMaster;
use App\Master;
use App\Step;
use App\Booking;
use App\End;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'phone', 'country', 'url','youtube'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    
    public function adminlte_image(){
        $social_profile = $this->socialProfiles->first();
        
        if($social_profile){
            return $social_profile->social_avatar;
        }else{
            return 'https://picsum.photos/300/300';
        }
        
    }

    public function adminlte_desc(){
        return "Administrador";
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }

    //Relacion uno a mochos

    public function SocialProfiles(){
        return $this->hasMany(SocialProfile::class);
    }

    public function ExamCodes(){
        return $this->hasMany(ExamCode::class);
    }

    public function masters()
    {
        return $this->belongsToMany(Master::class, 'table_fk_users_fk_masters' , 'user_id', 'master_id');
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
   
    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }    
    
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                 return true; 
            }   
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function getSteps(){
        return $this->hasMany(Step::class);
    }

    public function getEnds(){
        return $this->hasMany(End::class);
    }

    public function getbookings(){
        return $this->hasMany(Booking::class);
    }

}
