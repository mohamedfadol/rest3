<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rest_User extends Model
{
    protected $table = 'Rest_User';
    protected $primaryKey = 'Guid';
    protected $fillable = ['Guid','Name','BranchID'];
    public $incrementing = false;

}