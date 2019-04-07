<?php

namespace App;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
	 use NodeTrait;
	protected $guarded = [];
	// use NodeTrait;
    protected $fillable = ['name'];

}
