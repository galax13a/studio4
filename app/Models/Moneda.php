<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'monedas';

    protected $fillable = ['name','code','datax','status'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoicepaystudios()
    {
        return $this->hasMany('App\Models\Invoicepaystudio', 'moneda_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagemodels()
    {
        return $this->hasMany('App\Models\Pagemodel', 'moneda_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany('App\Models\Page', 'moneda_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymedios()
    {
        return $this->hasMany('App\Models\Paymedio', 'moneda_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paypages()
    {
        return $this->hasMany('App\Models\Paypage', 'moneda_id', 'id');
    }
    
}
