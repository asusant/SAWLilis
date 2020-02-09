<?php

namespace App\Modules\Level\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'levels';

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
    protected $fillable = ['level', 'icon', 'description', 'created_by', 'updated_by', 'deleted_by'];

    public function user_level()
    {
        return $this->hasMany('App\Modules\UserLevel\Models\UserLevel');
    }
    public function privilege()
    {
        return $this->hasMany('App\Modules\Privilege\Models\Privilege');
    }
    
}
