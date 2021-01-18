<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mats extends Model
{
    protected $table = 'mats';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Number','Code','Name1','GroupGuid','ClassGuid','PartGuid','Price1'];

    public function orderDetails()
    {
        return $this->hasMany('App\orderdetails' ,'MatGuid');
    }

    public function timesOrderdInBranchBetween($branch, $startDate, $endDate) 
    {
        $total = 0;
        $orders = $branch->ordersBetween($startDate, $endDate);

        foreach($orders as $order) {
            $detail = $order->orderDetails()->where('MatGuid', $this->Guid);
            
            if($detail->count() > 0)
                $total += $detail->first()->Qty;
        }
        
        return $total;
    }

    // this function for more mats salse
    public function moreTimesOrderdInBranchBetween($branch, $startDate, $endDate)  
    {
        $total = 0;
        $orders = $branch->ordersBetween($startDate, $endDate);

        foreach($orders as $order) {
            $detail = $order->orderDetails()->where('MatGuid', $this->Guid);
            
            if($detail->count() >= 1)
                $total += $detail->first()->Qty;
        }
        //dd($detail);
        return $total;
    }


        // this function for less mats salse
        public function lessTimesOrderdInBranchBetween($branch, $startDate, $endDate) 
        {
            $total = 0;
            $orders = $branch->ordersBetween($startDate, $endDate);
    
            foreach($orders as $order) {
                $detail = $order->orderDetails()->where('MatGuid' ,$this->Guid);
                
                if($detail->count() > 0)
                    $total += $detail->first()->Qty;
            }
            
            return $total;
        }

    public function timesOrderdInAllBranchesBetween($startDate, $endDate) 
    {
        $total = 0;
        $branches = branch::all();

        foreach($branches as $branch)
            $total += $this->timesOrderdInBranchBetween($branch, $startDate, $endDate);

        return $total;
    }
}
