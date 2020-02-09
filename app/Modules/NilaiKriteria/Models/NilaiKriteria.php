<?php

namespace App\Modules\NilaiKriteria\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiKriteria extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nilai_kriterias';

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
    protected $fillable = ['kriteria_id', 'deskripsi', 'nilai', 'created_by', 'updated_by', 'deleted_by'];

    public function kriteria()
    {
        return $this->belongsTo('App\Modules\Kriteria\Models\Kriteria');
    }
    
}
