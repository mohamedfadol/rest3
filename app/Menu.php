<?php

namespace App;

use App\Traits\Uuids;
use App\Traits\MultipleInsertByUserId;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Menu extends Model
{
    use Uuids  ,LogsActivity;
    //use MultipleInsertByUserId;

    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $table = 'menus';
    protected $guarded = [];
    protected $casts = ['id' => 'string']; 
    
    protected static $logUnguarded = true; 
    protected static $logAttributes = ['*'];
    protected static $recordEvents = ['deleted','created','updated'];
    protected static $logName = 'menus';
    public function getDescriptionForEvent(string $eventName): string
    {
        return "This model has been {$eventName}";
    }




    public function categories() 
    {
    	return $this->belongsToMany(Category::class , 'menu_category');
    }

    public function floors()  
    {
        return $this->hasMany(Floor::class);
    }  

    public function user() 
    { 
        return $this->belongsTo(User::class , 'addByUserId');
    } 

    public function products()
    {
        $products = collect();
            $categories =  $this->categories;
            foreach ($categories as $Category) {
                foreach ($Category->products as $product){
                    $products->push($product);
                }  
            }
        return $products;

    }

    public function modifires()
    {
        $modifires = collect();
        $products = $this->products();
        foreach ($products as $product) {
            foreach ($product->modifires as $modifire) {
                $modifires->push($modifire);
            }
        }
        return $modifires;
    }

    public function ingrediants()
    {
        $ingrediants = collect();
        $products = $this->products();
        foreach ($products as $product) {
            foreach ($product->ingredients as $ingredient) {
                $ingrediants->push($ingredient);
            }
        }
        return $ingrediants;
    }
}
