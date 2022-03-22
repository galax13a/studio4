<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dolar extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'dolars';

    protected $fillable = ['trm','trm2','date'];
	
}
