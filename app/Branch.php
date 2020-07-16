<?php

namespace App;

use App\Traits\Uuids;
use App\Traits\MultipleInsertByUserId; 
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Branch extends Model
{

    use Uuids  ,LogsActivity;
    
    //use MultipleInsertByUserId;

    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $table = 'branches';
    protected $guarded = [];
    protected $casts = ['id' => 'string'];   
    
    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'branches';

    public $hidden =[ 'monday_from', 'monday_to',
                       'tuesday_from', 'tuesday_to',
                       'wednesday_from', 'Wednesdayto',
                       'wednesday_to', 'Wednesdayfrom',
                       'thursday_from', 'thursday_to',
                       'friday_from', 'friday_to',
                       'saturday_from', 'saturday_to',
                       'sunday_from', 'sunday_to',
                       'tuesday_from', 'tuesday_to',
                    ]; 

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }

	public function owner(){return $this->belongsTo(User::class ,'addByUserId');}

    public function floors(){return $this->hasMany(Floor::class , 'branch_id'); }

    public function tables(){return $this->hasMany(Table::class , 'branch_id');}

    public function timeEvent(){return $this->hasMany(TimeEvent::class ,'branch_id');}

    public function orders(){return $this->hasMany(Order::class,'branch_id');}
    
    public function printers(){return $this->hasMany(Printer::class ,'branch_id');}
    
    public function employees(){return $this->hasMany(Employee::class ,'branch_id');}

    public function deliveries(){return $this->hasMany(Delivery::class ,'branch_id');}




}
