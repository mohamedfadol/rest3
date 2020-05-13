<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MultipleInsertByUserId;
use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model
{
    use Uuids  ,LogsActivity;
    // use , MultipleInsertByUserId;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $table = 'orders'; 
    protected $guarded = [];
    protected $casts = ['id' => 'string']; 
    
    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'orders';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }


    public function products(){return $this->belongsToMany(Product::class, 'order_details')->withPivot('Qty');}
    
    public function orderDetails(){return $this->hasMany(OrderDetail::class , 'order_id');}

    public function customer(){return $this->belongsTo(Customer::class , 'customer_id');}

    public function employee(){return $this->belongsTo(User::class , 'addByUserId');}

    public function billKind(){return $this->belongsTo(BillKind::class , 'bill_id');}

    public function branch(){return $this->belongsTo(Branch::class , 'branch_id');}

    public function table(){return $this->belongsTo(Table::class , 'table_id');}

    public function payment(){return $this->belongsTo(Payment::class ,'paymentType');}





    
}
