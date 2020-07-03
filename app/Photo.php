<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'photo_id';
    protected $fillable = ['photo_post_id' , 'photo_date' , 'photo_title' , 'photo_text'];

    public function Post(){
    	return $this->belongsTo('App\Post', 'photo_post_id');
    }

}
