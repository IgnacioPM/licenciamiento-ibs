<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cedula extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'cedula';

    protected $fillable = ['tipo_cedula','num_cedula'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function afiliados()
    {
        return $this->hasMany('App\Models\Afiliado', 'id_tipo_cedula', 'id');
    }
    
}
