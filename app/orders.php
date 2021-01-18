<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Number','DailyNumber','BillKind','Date','BillDate','TableGuid','HostGuid','CustGuid','Total','Extra','Service','Notes','UserGuid','branch_id'];
    
    public function branch()
    {
        return $this->belongsTo('App\branch', 'branch_id');
    }

    public function BillKind()
    {
        return $this->belongsTo('App\BillKind','BillKind');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\orderdetails' ,'OrderGuid');
    }
    
}
