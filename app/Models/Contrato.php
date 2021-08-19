<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'contrato';

    protected $fillable = ['tipo_contrato'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function afiliados()
    {
        return $this->hasMany('App\Models\Afiliado', 'id_tipo_contrato', 'id');
    }
    
}
