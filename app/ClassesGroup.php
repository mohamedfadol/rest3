<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassesGroup extends Model
{
    protected $table = 'ClassesGroup';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Name','Number','Code'];

    public function Mat()
    {
        return $this->hasMany('App\mats' ,'ClassGuid');
    }


}
