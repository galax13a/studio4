<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'modelos';

    protected $fillable = ['name','nick','email','dni','wsp','porce','typomodel','img1','img2','img3','status','studio_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudio()
    {
        return $this->hasOne('App\Models\Estudio', 'id', 'studio_id');
    }
    
}
