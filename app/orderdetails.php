<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderdetails extends Model
{
    protected $table = 'orderdetails';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Number','OrderNumber','OrderGuid','MatGuid','Qty','Price','Notes','UserGuid'];

    public function orders()
    {
        return $this->belongsTo('App\orders','OrderGuid');
    }

    public function ordersBetween($startDate, $endDate)
    {
        return $this->orders()->whereBetween('DateNew', [$startDate, $endDate])->get();
    }


    public function ordermats()
    {
        return $this->orders()->where('OrderGuid','=','Guid') ;
    }

    public function mats()
    {
        return $this->belongsTo('App\mats','MatGuid');
    }
    public function matsSales()
    {
        return $this->belongsTo('App\mats','MatGuid');
    }
}
