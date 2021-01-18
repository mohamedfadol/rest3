<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRepayment extends Model
{
    protected $table = 'OrderRepayment';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Number','OrderGuid','RePaymantGuid','Price'];
}
