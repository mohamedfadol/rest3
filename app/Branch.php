<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    
    protected $table = 'branch';
    protected $primaryKey = 'branch_id';
    // public $table 'created_at' = false;
    // public $table 'updated_at' = false;

    public function orders()
    {
        return $this->hasMany('App\orders', 'branch_id');
    }

    public function Billkind()
    {
        return $this->hasMany('App\Billkind', 'Billkind');
    }
    
    public function ordersBetween($startDate, $endDate)
    { 
        return $this->orders()->whereBetween('Date', [$startDate, $endDate])->get();
    }


    public function ordersSum($startDate, $endDate)
    {
        $totalSum = 0;
        $orders = $this->ordersBetween($startDate, $endDate);
        foreach($orders as $order) {
            $totalSum += $order->Total + $order->Tax + $order->Extra - $order->Discount;
        }

        return $totalSum;
    }

    public function ordersSumByType($startDate, $endDate) 
    {
        $totalInSum = 0;
        $totalOutSum = 0;
        $totalPresentSum = 0;
        $totalDeliverySendSum = 0;
        $totalDeliveryComesSum = 0;
        $totalCarSum = 0;
        $orders = $this->ordersBetween($startDate, $endDate);
        foreach($orders as $order) {
            switch ($order->Billkind->BillKindNameEnglish) {
                case 'In':
                    $totalInSum += $order->Total + $order->Tax + $order->Extra - $order->Discount;
                    break;
                case 'Out':
                    $totalOutSum += $order->Total + $order->Tax + $order->Extra - $order->Discount;
                    break;
                case 'Present':
                    $totalPresentSum += $order->Total + $order->Tax + $order->Extra - $order->Discount;
                    break;
                case 'Delivery Send':
                    $totalDeliverySendSum += $order->Total + $order->Tax + $order->Extra - $order->Discount;
                    break;
                case 'Delivery Comes':
                    $totalDeliveryComesSum += $order->Total + $order->Tax + $order->Extra - $order->Discount;
                    break;
                case 'Car':
                    $totalCarSum += $order->Total + $order->Tax + $order->Extra - $order->Discount;
                    break;
                
                default:
                    
                    break;
            }
            
        }

        $result = array('in' => $totalInSum,
                        'out' => $totalOutSum,
                        'present' => $totalPresentSum,
                        'delivery-send' => $totalDeliverySendSum ,
                        'delivery-comes' => $totalDeliveryComesSum,
                        'car' => $totalCarSum );

        return $result;
    }


} // End class of Branch
