<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'pages';

    protected $fillable = ['name','monedax','value','link','status','studio_id','pagemaster_id','moneda_id'];
	
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
    public function pagemaster()
    {
        return $this->hasOne('App\Models\Pagemaster', 'id', 'pagemaster_id');
    }

    public function moneda()
    {
        return $this->hasOne('App\Models\Moneda', 'id', 'moneda_id');
    }
    
}
