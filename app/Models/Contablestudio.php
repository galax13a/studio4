<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contablestudio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'contablestudios';

    protected $fillable = ['name','value','status','codesubmaster','datax','studio_id','contable_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contable()
    {
        return $this->hasOne('App\Models\Contable', 'id', 'contable_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudio()
    {
        return $this->hasOne('App\Models\Estudio', 'id', 'studio_id');
    }
    
}
