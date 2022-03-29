<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trafic1 extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'trafic1s';

    protected $fillable = ['url','pagui','datax','status','page_id','tiposala'];
	
}
