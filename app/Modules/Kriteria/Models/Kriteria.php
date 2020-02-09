<?php

namespace App\Modules\Kriteria\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kriteria extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'kriterias';

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
    protected $fillable = ['kode_kriteria', 'kriteria', 'bobot', 'atribut', 'created_by', 'updated_by', 'deleted_by'];

    public function evaluasi()
    {
        return $this->hasMany('App\Modules\Evaluasi\Models\Evaluasi');
    }

    public function nilai()
    {
        return $this->hasMany('App\Modules\NilaiKriteria\Models\NilaiKriteria');
    }
}
