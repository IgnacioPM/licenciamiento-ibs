<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'capacitacion';

    protected $fillable = ['tipo_capacitacion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function afiliados()
    {
        return $this->hasMany('App\Models\Afiliado', 'id-tipo_capacitacion', 'id');
    }
    
}
