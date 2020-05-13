<?php
namespace App;

use App\Traits\Uuids;
use App\Traits\MultipleInsertByUserId;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ClassProduct extends Model
{
    use Uuids  ,LogsActivity; 
    
    //use MultipleInsertByUserId;
    protected $primaryKey = 'id'; 
    public $incrementing = false;
    protected $table = 'class_products';
    protected $guarded = [];
    protected $casts = ['id' => 'string'];  
    
    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'class_products';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }

    public function user(){return $this->belongsTo(User::class , 'addByUserId');}
    
    public function products(){return $this->hasMany(Product::class , 'class_id');}
}
