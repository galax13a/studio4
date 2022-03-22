<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conexion extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'conexions';

    protected $fillable = ['date','time_page','time_real','time_min','timebrb','studio_id','model_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudio()
    {
        return $this->hasOne('App\Models\Estudio', 'id', 'studio_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modelo()
    {
        return $this->hasOne('App\Models\Modelo', 'id', 'model_id');
    }
    
}
