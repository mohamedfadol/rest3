<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
    protected $table = 'Parts';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Name','Number','Code'];
    
    public function Mat()
    {
        return $this->hasOne('App\mats' ,'PartGuid');
    }
}