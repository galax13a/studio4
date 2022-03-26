<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'monedas';

    protected $fillable = ['name','status'];
	
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
    public function paypages()
    {
        return $this->hasMany('App\Models\Paypage', 'moneda_id', 'id');
    }

    public function monedanax()
    {
        return $this->hasMany('App\Models\Page', 'moneda_id', 'id');
    }

    
}
