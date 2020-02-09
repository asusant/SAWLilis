<?php

namespace App\Modules\UserLevel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLevel extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_levels';

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
    protected $fillable = ['user_id', 'level_id', 'created_by', 'updated_by', 'deleted_by'];

    public function user()
    {
        return $this->belongsTo('App\Modules\User\Models\User');
    }
    public function level()
    {
        return $this->belongsTo('App\Modules\Level\Models\Level');
    }
    
}
