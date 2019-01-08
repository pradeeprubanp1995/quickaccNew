<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{

	
    public function department(){

    	 //return $this->hasMany('App\Department', 'id');
    	 // $this->belongsTo('App\Department', 'dept_id');
         // dd($data);exit;
         return $this->belongsTo('App\Department', 'dept_id');
    	 
    }
    public function category(){

    	 //return $this->hasMany('App\Department', 'id');
        // $data = $this->belongsTo('App\Category', 'cat_id');
        
    	 return $this->belongsTo('App\Category', 'cat_id');
    	 
    }
    public function subcategory(){

         //return $this->hasMany('App\Department', 'id');
         return $this->belongsTo('App\Category', 'subcat_id');
         
    }
}
