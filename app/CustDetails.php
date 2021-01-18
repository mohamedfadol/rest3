<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustDetails extends Model
{
    protected $table = 'CustDetails';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','CustGuid','Phone','PhoneNumber','Notes','Address'];

}
