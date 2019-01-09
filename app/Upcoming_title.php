<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upcoming_title extends Model
{
    //
    public function department(){

         //return $this->hasMany('App\Department', 'id');
        // $data = $this->belongsTo('App\Category', 'cat_id');
        
         return $this->belongsTo('App\Department', 'dept_id');
         
    }
    public function title(){

         //return $this->hasMany('App\Department', 'id');
        // $data = $this->belongsTo('App\Category', 'cat_id');
        
         return $this->belongsTo('App\Title', 'title_id');
         
    }
}
