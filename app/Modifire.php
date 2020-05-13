<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MultipleInsertByUserId;
use Spatie\Activitylog\Traits\LogsActivity;

class Modifire extends Model
{


    use Uuids  ,LogsActivity;
    // use , MultipleInsertByUserId;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $table = 'modifires';
    protected $guarded = [];
    protected $casts = ['id' => 'string']; 
    
    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'modifires';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }



    public function products(){return $this->belongsToMany(Product::class ,'product_modifire');}

    public function user(){return $this->belongsTo(User::class , 'addByUserId');}
    
}
