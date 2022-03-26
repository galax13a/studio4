<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paystudio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'paystudios';

    protected $fillable = ['date','num','data1','data2','date_ini','date_finish','payout','status','program','studio_id','page_id','medio_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudio()
    {
        return $this->hasOne('App\Models\Estudio', 'id', 'studio_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoicepaystudios()
    {
        return $this->hasMany('App\Models\Invoicepaystudio', 'paystudio_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function page()
    {
        return $this->hasOne('App\Models\Page', 'id', 'page_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymediosdetail()
    {
        return $this->hasOne('App\Models\Paymediosdetail', 'id', 'medio_id');
    }

    public function medio()
    {
        return $this->hasOne('App\Models\Paymediosdetail', 'id', 'medio_id');
    }
    
}
