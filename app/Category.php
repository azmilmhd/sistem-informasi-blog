<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'cat_id';
    protected $fillable = ['cat_id' , 'cat_nama' , 'cat_text'];
}
