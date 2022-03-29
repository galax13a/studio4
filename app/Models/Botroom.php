<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Botroom extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'botrooms';

    protected $fillable = ['url','datax','status','page_id','tiposala'];
	
}
