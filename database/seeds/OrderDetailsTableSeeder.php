<?php

use App\User;
use App\Order;
use App\Table;
use App\Branch;
use App\Customer;
use App\BillKind;
use App\Product;
use Carbon\Carbon; 
use App\OrderDetail;
use Illuminate\Database\Seeder;  

class OrderDetailsTableSeeder extends Seeder 
{
    /**
     * Run the database seeds.
     *
     * @return void 
     */  
    public function run()
    {
        for ($i=0; $i < 200; $i++) { 
            $od = new OrderDetail;
            
            $od->id = Str::random(36);
            $od->OrderNumber = $i;
            $od->Qty = rand(1,12);
            $od->price = rand(50,2000);
            $od->order_id = Order::all()->random()->id;
            $od->product_id = Product::all()->random()->id;
            $od->addByUserId = User::all()->random()->id;
            $od->created_at = Carbon::now()->subdays(rand(0, 30));
            $od->updated_at = $od->created_at;
            $od->save();
        }
    }
}
