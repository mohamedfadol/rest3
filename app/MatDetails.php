<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatDetails extends Model
{
    protected $table = 'matdetails';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','MatGuid','MatElementGuid','Qty'];
    
    public function matElement()
    {
        return $this->belongsToMany('MatsElements::class' ,'MatElementGuid');
    }
    public function mats()
    {
        return $this->hasMany('mats::class' ,'MatGuid');
    }
}