<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'solicitud';

    protected $fillable = ['tipo_solicitud'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function afiliados()
    {
        return $this->hasMany('App\Models\Afiliado', 'id_tipo_solicitud', 'id');
    }
    
}
