<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'comercio';

    protected $fillable = ['tipo_comercio'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function afiliados()
    {
        return $this->hasMany('App\Models\Afiliado', 'id_tipo_comercio', 'id');
    }
    
}
