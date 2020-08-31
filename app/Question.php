<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

     

}
