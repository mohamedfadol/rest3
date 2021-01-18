<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tables extends Model
{
    protected $table = 'Tables';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Name','Number','Code','PlaceGuid'];

    public function Orders()
    {
        return $this->hasMany('App\orders' ,'TableGuid');
    }


}
