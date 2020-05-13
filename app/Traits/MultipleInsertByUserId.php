<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Auth;

trait MultipleInsertByUserId 
{

    public static function bootMultipleInsertByUserId()
	{
	    //parent::boot();
        // if (auth()->check()) {
        //     static::creating(function ($model) {
        //         $model->addByUserId = auth()->id();
        //     });
        //     static::addGlobalScope('addByUserId', function (Builder $builder) {
        //         if (auth()->check()) {
        //             return $builder->where('addByUserId', auth()->id());
        //         }
        //     });
        // }	




	}




}
