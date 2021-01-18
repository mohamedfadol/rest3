<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RePayment extends Model
{
    protected $table = 'RePayment';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Name','Number','Code','Type','Value','DefaultCurrency'];

}
