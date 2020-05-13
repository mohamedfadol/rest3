<?php

namespace App;

use App\Traits\Uuids;
use App\Traits\MultipleInsertByUserId;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Table extends Model 
{

    use Uuids,LogsActivity;
    // use , MultipleInsertByUserId;

    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $table = 'tables';
    protected $guarded = []; 
    protected $casts = ['id' => 'string']; 

    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'tables';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }


    public function branch(){return $this->belongsTo(Branch::class , 'branch_id');}

    public function user(){return $this->belongsTo(User::class , 'addByUserId');} 

    public function floor(){return $this->belongsTo(Floor::class , 'floor_id');}
    
    public function orders(){return $this->hasMany(Order::class , 'table_id');} 
    

}
