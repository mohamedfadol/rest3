<?php

namespace App;

use App\Traits\Uuids;
use App\Traits\MultipleInsertByUserId;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BillKind extends Model 
{
    use Uuids  ,LogsActivity;
    
    //use MultipleInsertByUserId;

    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $table = 'bill_kinds';
    protected $guarded = [];
    protected $casts = ['id' => 'string']; 
    
    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'bill_kinds';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }

    public function user(){return $this->belongsTo(User::class , 'addByUserId');}
    
    public function orders(){return $this->belongsTo(Order::class , 'bill_id');}
    
}
