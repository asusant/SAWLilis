<?php

namespace App\Modules\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';

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
    protected $fillable = ['group_menu_id', 'menu', 'icon', 'priority', 'created_by', 'updated_by', 'deleted_by'];

    public function group_menu()
    {
        return $this->belongsTo('App\Modules\GroupMenu\Models\GroupMenu');
    }

    public function module()
    {
        return $this->hasMany('App\Modules\Module\Models\Module');
    }
    
}
