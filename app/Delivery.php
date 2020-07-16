<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Delivery extends Model
{
    use Uuids  ,LogsActivity;
    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $table = 'deliveries';
    protected $guarded = [];
    protected $casts = ['id' => 'string']; 

    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'deliveries';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }

    public function branch(){return $this->belongsTo(Branch::class);} 
    
    public function owner(){return $this->belongsTo(User::class);} 


}
