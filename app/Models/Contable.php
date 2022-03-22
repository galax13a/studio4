<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contable extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'contables';

    protected $fillable = ['name','value','status','codemaster','datax','empresa_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contablestudios()
    {
        return $this->hasMany('App\Models\Contablestudio', 'contable_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresa_id');
    }
    
}
