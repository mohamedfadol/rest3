<?php

namespace App;

use App\Traits\Uuids;
use App\Traits\MultipleInsertByUserId;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Floor extends Model 
{
    use Uuids  ,LogsActivity;
  
    
    //use MultipleInsertByUserId;

    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $table = 'floors';
    protected $guarded = [];
    protected $casts = ['id' => 'string'];  
    
    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'floors';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }


    public function orders(){return $this->hasManyThrough(Order::class, Table::class);}

    public function employees(){return $this->hasMany(User::class , 'floor_id');}

    public function branch(){return $this->belongsTo(Branch::class ,'branch_id');} 

    public function user(){return $this->belongsTo(User::class ,'addByUserId');}

    public function tables(){return $this->hasMany(Table::class , 'floor_id');} 
    
    public function employee(){return $this->hasMany(User::class ,'floor_id');}
    
    public function menu(){return $this->belongsTo(Menu::class ,'menu_id');}




}
