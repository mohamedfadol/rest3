<?php

namespace App;

use App\Traits\Uuids;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{ 
    use Uuids , HasApiTokens ,LogsActivity;
    use Notifiable;
    use HasRoles; 

    protected $primaryKey = 'id'; 
    public $incrementing = false;
    protected $table = 'users';
    protected $guarded = [];
    protected $casts = ['id' => 'string' ,'email_verified_at' => 'datetime']; 
    protected $guard_name = 'web';
    protected $hidden = [
                            'password', 'remember_token',
                            'id','type','businessName',
                            'email', 'isAdmin',
                            'branch_number', 'user_number',
                            'name', 'country',
                        ]; 
    
    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'users';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }


    public function tableReserve(){return $this->hasMany(TableReserve::class , 'addByUserId');}

    public function orderDetails(){return $this->hasMany(OrderDetail::class , 'addByUserId');}

    public function ingrediants(){ return $this->hasMany(Ingredient::class , 'addByUserId');}

    public function voidOrder(){return $this->hasMany(voidOrder::class , 'addByUserId');}

    public function timeEvent(){return $this->hasMany(TimeEvent::class , 'addByUserId');}

    public function categories(){return $this->hasMany(Category::class , 'addByUserId');}
    
    public function modifires(){return $this->hasMany(Modifire::class , 'addByUserId');}

    public function giftCard(){return $this->hasMany(giftCard::class , 'addByUserId');}

    public function billKind(){return $this->hasMany(BillKind::class , 'addByUserId');} 

    public function products(){return $this->hasMany(Product::class , 'addByUserId');}

    public function branches(){return $this->hasMany(Branch::class , 'addByUserId');} 

    public function employees(){return $this->hasMany(Employee::class , 'addByUserId');}

    public function floors(){return $this->hasMany(Floor::class , 'addByUserId');} 
 
    public function branch(){return $this->belongsTo(Branch::class , 'branch_id');}

    public function tables(){return $this->hasMany(Table::class , 'addByUserId');}

    public function orders(){return $this->hasMany(Order::class , 'addByUserId');}

    public function floor(){return $this->belongsTo(Floor::class , 'floor_id');}

    public function menus(){return $this->hasMany(Menu::class , 'addByUserId');}
    
    public function trans(){return $this->hasMany(Trans::class, 'addByUserId');}

    public function classes(){return $this->hasMany(ClassProduct::class, 'addByUserId');}

    public function printers(){return $this->hasMany(Printer::class ,'addByUserId');}

    public function payments(){return $this->hasMany(Payment::class ,'addByUserId');}

    public function deliveries(){return $this->hasMany(Delivery::class ,'addByUserId');}
    

}
