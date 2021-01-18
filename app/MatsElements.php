<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatsElements extends Model
{
    protected $table = 'matselements';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Number','Code','Name','Unity','Price'];
    
    public function matsDetails()
    {
        return $this->hasMany('MatDetails::class' ,'MatElementGuid');
    }
    
}