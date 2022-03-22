<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagemodel extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'pagemodels';

    protected $fillable = ['nick','pass','status','galery','studio_id','model_id','moneda_id'];
	
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
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function moneda()
    {
        return $this->hasOne('App\Models\Moneda', 'id', 'moneda_id');
    }
    
}
