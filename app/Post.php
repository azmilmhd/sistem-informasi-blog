<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'post_id';
    protected $fillable = ['post_cat_id','post_date' , 'post_slug' , 'post_title' , 'post_text'];
    

    public function Category(){
    	return $this->belongsTo('App\Category', 'post_cat_id');
    }
}
