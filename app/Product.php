<?php

namespace App;

use App\Traits\Uuids;
use App\Traits\MultipleInsertByUserId;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use Uuids,LogsActivity;
    
    //use MultipleInsertByUserId;

    protected $primaryKey = 'id'; 
    public $incrementing = false;
    protected $table = 'products';
    protected $guarded = [];
    protected $casts = ['id' => 'string']; 

    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'products';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    } 


    public function ingredients(){return $this->belongsToMany(Ingredient::class ,'product_ingredient')->withPivot('quantity');}

    public function modifires(){return $this->belongsToMany(Modifire::class , 'product_modifire');}

    public function orderDetails(){return $this->hasMany(OrderDetail::class , 'product_id');}

    public function timeEvent(){return $this->hasMany(TimeEvent::class ,'product_id');} 

    public function voidOrder(){return $this->hasMany(voidOrder::class , 'product_id');}

    public function image(){return $this->hasOne(Image::class);} 
    
    public function category(){return $this->belongsTo(Category::class);} 

    public function user(){return $this->belongsTo(User::class, 'addByUserId');} 

    public function class(){return $this->belongsTo(ClassProduct::class , 'class_id');}  

    public function printer(){return $this->belongsTo(Printer::class);}


    



    
}
