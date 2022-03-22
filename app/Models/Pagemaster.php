<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagemaster extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'pagemasters';

    protected $fillable = ['name','link','logo','status'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany('App\Models\Page', 'pagemaster_id', 'id');
    }
    
}
