<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactCategory extends Model
{
    protected $table = 'contact_category';
	protected $fillable = ['id','name','status'];
}
