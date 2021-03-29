<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'bank_slips';

    protected $fillable = ['name','email','status','user_id'];
    
    public $timestamps = true;
}
