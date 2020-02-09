<?php

namespace App\Modules\Profile\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'username', 'email', 'password'];

    public function user_level()
    {
        return $this->hasMany('App\Modules\UserLevel\Models\UserLevel');
    }
    public function log()
    {
        return $this->hasMany('App\Modules\Log\Models\Log');
    }
    
}
