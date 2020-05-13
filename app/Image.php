<?php

namespace App;

use App\Traits\Uuids;
use App\Traits\MultipleInsertByUserId;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Image extends Model
{
    
    use Uuids  ,LogsActivity;
    
    //use MultipleInsertByUserId;

    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $table = 'images';
    protected $guarded = [];
    protected $casts = ['id' => 'string'];  
    
    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'images';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }


    public function category()
    {
    	return $this->belongsTo(Category::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
