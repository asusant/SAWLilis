<?php

namespace App\Modules\Module\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modules';

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
    protected $fillable = ['menu_id', 'module', 'route', 'icon', 'priority', 'created_by', 'updated_by', 'deleted_by'];

    public function menu()
    {
        return $this->belongsTo('App\Modules\Menu\Models\Menu');
    }

    public function privilege()
    {
        return $this->hasMany('App\Modules\Privilege\Models\Privilege');
    }
    
}
