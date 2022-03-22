<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'prizes';

    protected $fillable = ['name','description','date','date2','value','status','img','studio_id',];
	
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
