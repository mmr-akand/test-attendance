<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{	
    use SoftDeletes;
	protected $table='banks';
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    ////////////////
    // RELATIONS  //
    ////////////////
    public function branchBybank()
    {
        return $this->hasMany('App\Branch', 'bank_id');
    }
}
