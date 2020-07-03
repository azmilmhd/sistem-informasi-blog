<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'album_id';
    protected $fillable = ['album_photo_id' , 'album_name' , 'album_text'];

    public function Photo(){
    	return $this->belongsTo('App\Photo', 'album_photo_id');
    }
}
