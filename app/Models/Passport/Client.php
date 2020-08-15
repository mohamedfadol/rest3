<?php

namespace App\Models\Passport;
use Webpatser\Uuid\Uuid;
use Laravel\Passport\Client as OAuthClient; 
class Client extends OAuthClient
{ 
    /** 
     * Indicates if the IDs are auto-incrementing. 
     * 
     * @var bool 
     */ 
    public $incrementing = false; 
    public static function boot()
    { 
         static::creating(function ($model) {
            $model->uuid = Uuid::generate()->string; 
         }); 
    } 
}