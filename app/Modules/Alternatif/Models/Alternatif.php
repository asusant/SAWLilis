<?php

namespace App\Modules\Alternatif\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alternatif extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'alternatifs';

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
    protected $fillable = ['alternatif', 'nip', 'section_id', 'keterangan', 'created_by', 'updated_by', 'deleted_by'];

    public function evaluasi()
    {
        return $this->hasMany('App\Modules\Evaluasi\Models\Evaluasi');
    }

    public function section()
    {
        return $this->belongsTo('App\Modules\Section\Models\Section');
    }
}
