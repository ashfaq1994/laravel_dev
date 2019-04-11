<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $fillable = ['title','body'];
	
    public function user()
    {
    	return $this->belongTo(User::class);

    	// $Question:find(1)
    	// $Question->user->email;
    }

    public function setTitleAttribute($value)
    {
       $this->attributes['title'] = $value;
       $this->attributes['slug'] = str_slug($value);
    }


}
