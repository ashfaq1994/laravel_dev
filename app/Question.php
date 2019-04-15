<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $fillable = ['title','body'];
	
    public function user()
    {
    	return $this->belongsTo(User::class);

    	// $Question:find(1)
    	// $Question->user->email;
    }

    public function setTitleAttribute($value)
    {
       $this->attributes['title'] = $value;
       $this->attributes['slug'] = str_slug($value);
    }

    public function getUrlAttribute()
    {
         return route('questions.show', $this->slug);
        //return "#";
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute($value='')
    {
        if ($this->answers > 0) {
            if ($this->best_answered_id) {
               return "answered-accepted";
            }
            return 'answered';
        }

        return "unanswered";
    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }


}
