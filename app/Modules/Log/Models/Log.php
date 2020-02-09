<?php

namespace App\Modules\Log\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'logs';

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
    protected $fillable = ['user_id', 'table', 'row_id', 'action', 'description', 'created_by', 'updated_by', 'deleted_by'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function captureLog($user_id, $table, $row_id, $action, $description)
    {
        $data['user_id'] = $user_id;
        $data['table'] = $table;
        $data['row_id'] = $row_id;
        $data['action'] = $action;
        $data['description'] = $description;
        $data['created_by'] = Auth::user()->id;

        $log = Log::create($data);
        
        return $log;
    }
    
}
