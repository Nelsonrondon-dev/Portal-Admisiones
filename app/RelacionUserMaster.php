<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Master;

class RelacionUserMaster extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'table_fk_users_fk_masters';

    protected $fillable = [
        'user_id', 'master_id', 
    ];



}
