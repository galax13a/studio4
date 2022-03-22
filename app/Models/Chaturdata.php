<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chaturdata extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'chaturdatas';

    protected $fillable = ['name','link','type','status','studio_id','pagemaster_id'];
	
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
    
}
