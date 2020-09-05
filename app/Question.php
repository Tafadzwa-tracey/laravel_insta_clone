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
     //define a question successor
     public function getUrlAttribute(){
         return route("questions.show",$this->id);
     }
     //define a successor tp create date
     public function getCreatedDateAttribute(){
         return $this->created_at->diffforHumans();
     }
     //votes successor
     public function getStatusAttribute(){
         if($this->answers>0){
             if($this-> best_answer_id){
                return "answered-accepted";
             }
             return "answered";
         }
         return "unanswered";
     }
}
