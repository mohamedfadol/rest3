<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custs extends Model
{
    protected $table = 'Custs';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Name','Number','Code'];

    public function Orders()
    {
        return $this->hasMany('App\orders' ,'CustGuid');
    }


}
