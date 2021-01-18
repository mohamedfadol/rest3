<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'Payment';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Number','Date','Debit','Credit','UserGuid'];

}
