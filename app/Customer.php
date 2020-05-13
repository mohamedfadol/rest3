<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MultipleInsertByUserId; 
use Spatie\Activitylog\Traits\LogsActivity;

class Customer extends Model
{
    use Uuids  ,LogsActivity;
    
    //use MultipleInsertByUserId;

    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $table = 'customers';
    protected $guarded = [];
    protected $casts = ['id' => 'string']; 

    
    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'customers';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }


    public function orders(){ return $this->hasMany(Order::class , 'customer_id');}

    
}
