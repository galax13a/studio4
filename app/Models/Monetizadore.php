<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monetizadore extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'monetizadores';

    protected $fillable = ['nit','name','pagina','contact','email','porce','status','datax'];
	
}
