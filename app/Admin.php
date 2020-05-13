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


class Admin extends Authenticatable
{ 
    use Uuids , HasApiTokens ,LogsActivity;
    //use MultipleInsertByUserId ;
    use Notifiable;
    use HasRoles; 

	protected $guard = 'admin';
    protected $primaryKey = 'id'; 
    public $incrementing = false;
    protected $table = 'admins';
    protected $fillable = ['name', 'email', 'password', ];
    protected $hidden = [ 'password', 'remember_token', ];
 
    
    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'bill_kinds';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }


}
