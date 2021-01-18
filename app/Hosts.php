<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hosts extends Model
{
    protected $table = 'Hosts';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Name','Number','Code'];
    
    public function Mat()
    {
        return $this->hasOne('App\orders' ,'HostGuid');
    }
}