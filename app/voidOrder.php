<?php

namespace App;

use App\Traits\Uuids;
use App\Traits\MultipleInsertByUserId;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class voidOrder extends Model
{
    use Uuids,LogsActivity;
    
    //use MultipleInsertByUserId;

    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $table = 'void_orders';
    protected $guarded = [];
    protected $casts = ['id' => 'string'];  

    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'voidOrder';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }



    public function product(){return $this->belongsTo(Product::class , 'product_id');}


}
