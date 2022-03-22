<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymedio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'paymedios';

    protected $fillable = ['name','datax','studio_id','moneda_id','status'];
	
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
    public function moneda()
    {
        return $this->hasOne('App\Models\Moneda', 'id', 'moneda_id');
    }
    
}
