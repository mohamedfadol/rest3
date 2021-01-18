<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Name','Number','Code'];
    
    public function Mat()
    {
        return $this->hasMany('App\mats' ,'GroupGuid');
    }
}
