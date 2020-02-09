<?php

namespace App\Modules\Config\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Config extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'configs';

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
    protected $fillable = ['config_name', 'key', 'value', 'description', 'created_by', 'updated_by', 'deleted_by'];

    public static function getConfig($key)
    {
      $config = Config::where('key', $key)->pluck('value');
      return $config;
    }

}
