<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TablePlaces extends Model
{
    protected $table = 'TablePlaces';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Name','Number','Code','HostGuid'];

    public function Tables()
    {
        return $this->hasMany('App\Tables' ,'PlaceGuid');
    }


}
