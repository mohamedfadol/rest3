<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillKind extends Model
{
    protected $table = 'billkind';
    protected $primaryKey = 'BillKind';

    public function orders()
    {
        return $this->hasMany('App\orders','BillKind');
    }
}
