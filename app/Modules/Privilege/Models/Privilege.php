<?php

namespace App\Modules\Privilege\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Privilege extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'privileges';

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
    protected $fillable = ['level_id', 'module_id', 'index', 'create', 'show', 'store', 'edit', 'update', 'destroy', 'custom', 'created_by', 'updated_by', 'deleted_by'];

    public function level()
    {
        return $this->belongsTo('App\Modules\Level\Models\Level');
    }
    public function module()
    {
        return $this->belongsTo('App\Modules\Module\Models\Module');
    }
    
}
