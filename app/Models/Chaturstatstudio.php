<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chaturstatstudio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'chaturstatstudios';

    protected $fillable = ['date','date_ini','date_finish','payout','status','program','studio_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudio()
    {
        return $this->hasOne('App\Models\Estudio', 'id', 'studio_id');
    }
    
}
