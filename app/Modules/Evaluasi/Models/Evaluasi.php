<?php

namespace App\Modules\Evaluasi\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluasi extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'evaluasis';

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
    protected $fillable = ['alternatif_id', 'kriteria_id', 'nilai', 'created_by', 'updated_by', 'deleted_by'];

    public function alternatif()
    {
        return $this->belongsTo('App\Modules\Alternatif\Models\Alternatif');
    }

    public function kriteria()
    {
        return $this->belongsTo('App\Modules\Kriteria\Models\Kriteria');
    }
    
}
