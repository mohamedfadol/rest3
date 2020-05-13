<?php

namespace App;

use App\Traits\Uuids;
use Laravel\Passport\HasApiTokens;
use App\Traits\MultipleInsertByUserId;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Employee extends Authenticatable
{
    use Uuids , HasApiTokens ,LogsActivity;
    //use MultipleInsertByUserId ;
    use Notifiable;
    use HasRoles;  

    protected $primaryKey = 'id'; 
    public $incrementing = false;
    protected $table = 'employees';
    protected $fillable = ['firstName', 'LastName', 'binCode', 'branch_id', 'floor_id', 'addByUserId'];
    protected $casts = ['id' => 'string']; 
    protected $guard_name = 'web';
    
    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'employees';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }

    public function owner(){return $this->belongsTo(User::class , 'addByUserId');}
    public function branch(){return $this->belongsTo(Branch::class , 'branch_id');}
    public function floor(){return $this->belongsTo(Floor::class , 'floor_id');}

}