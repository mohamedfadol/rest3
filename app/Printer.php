<?php

namespace App;

use App\Traits\Uuids;
use App\Traits\MultipleInsertByUserId;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Printer extends Model
{
    use Uuids,LogsActivity;
    //use MultipleInsertByUserId;

    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $table = 'printers';
    protected $guarded = [];
    protected $casts = ['id' => 'string'];

    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'printers';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }


    public function branch(){return $this->belongsTo(Branch::class , 'branch_id');}

    public function user(){return $this->belongsTo(User::class , 'addByUserId');}

    public function products(){return $this->hasMany(Product::class , 'product_id');}
    
}
