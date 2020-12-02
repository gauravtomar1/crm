<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAdd extends Model
{
    protected $table = 'address';
	protected $fillable = ['note','address','units','vacent','date_available','user_id'];
}
