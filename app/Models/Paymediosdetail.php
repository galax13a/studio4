<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymediosdetail extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'paymediosdetails';

    protected $fillable = ['name','status','studio_id','model_id','paymedio_id'];
	
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
    public function paymedio()
    {
        return $this->hasOne('App\Models\Paymedio', 'id', 'paymedio_id');
    }
    
}
