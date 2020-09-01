<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Question extends Model
{
    //relationship in question and user model
    //atributes for mass assignment
    protected $fillable = ['title' ,'body'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    /*$question =Question::find(1);
     $question ->user->name*/

      //mutator for title attribute
    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value); //convet string into a slug

    }
     

}
