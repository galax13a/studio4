<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoicepaystudio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'invoicepaystudios';

    protected $fillable = ['name','date','payout','dolar_value','dolar_oficial','dolar_pagado','iva','status','img_studio','img_payment','datax','studio_id','contable_id','moneda_id','monetizador_id','paystudio_id'];
	
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
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function moneda()
    {
        return $this->hasOne('App\Models\Moneda', 'id', 'moneda_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function monetizadore()
    {
        return $this->hasOne('App\Models\Monetizadore', 'id', 'monetizador_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paystudio()
    {
        return $this->hasOne('App\Models\Paystudio', 'id', 'paystudio_id');
    }
    
}
