<?php

namespace App;

use App\Traits\Uuids;
use App\Traits\MultipleInsertByUserId;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{


    use Uuids  ,LogsActivity;
    
    //use MultipleInsertByUserId;

    protected $primaryKey = 'id';  
    public $incrementing = false; 
    protected $table = 'categories';
    protected $guarded = [];
    protected $casts = ['id' => 'string'];
    
    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'categories';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }

    public function menus(){return $this->belongsToMany(Menu::class , 'menu_category');}

    public function timeEvent(){return $this->hasMany(TimeEvent::class, 'category_id');}

    public function parent(){return $this->belongsTo(Category::class , 'id');}

    public function user(){return $this->belongsTo(User::class , 'addByUserId');} 

    public function image(){return $this->hasOne(Image::class, 'category_id');}

    public function products(){return $this->hasMany(Product::class);}


} 
