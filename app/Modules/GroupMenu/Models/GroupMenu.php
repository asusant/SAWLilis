<?php

namespace App\Modules\GroupMenu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupMenu extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'group_menus';

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
    protected $fillable = ['group_name', 'icon', 'created_by', 'updated_by', 'deleted_by'];

    public function menu()
    {
        return $this->hasMany('App\Modules\Menu\Models\Menu');
    }
    
}
