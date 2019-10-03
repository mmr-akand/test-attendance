<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{	
    use SoftDeletes;
	protected $table='branches';
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','bank_id'];
    ////////////////
    // RELATIONS  //
    ////////////////
    public function branchBybank()
    {
        return $this->belongsTo('App\Bank', 'bank_id');
    }
}
