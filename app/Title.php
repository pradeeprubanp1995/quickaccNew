<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
// use Department;

class Title extends Model
{

	
    
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
