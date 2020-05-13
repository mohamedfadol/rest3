<?php

use App\User;
use App\Order;
use App\Table;
use App\Branch;
use App\Customer;
use App\BillKind;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()  
    {
        //$paymentTypes = ['cache', 'visa card', 'receivables'];
        for ($i=0; $i < 300; $i++) { 
            $order = new Order;
 
            $order->id = Str::random(36);
            $order->branch_id = Branch::all()->random()->id;
            $order->customer_id = Customer::all()->random()->id;
            $order->table_id = Table::all()->random()->id;
            $order->paymentType = Payment::all()->random()->id;
            $order->bill_id = BillKind::all()->random()->id;
            $order->addByUserId = User::all()->random()->id;
            $order->total = rand(50, 300);
            $order->created_at = Carbon::now()->subdays(rand(0, 30));
            $order->updated_at = $order->created_at;

            $order->save();
        }
        
    }
}
