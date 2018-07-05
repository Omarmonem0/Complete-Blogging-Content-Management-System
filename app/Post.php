<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
    public function getFeaturedAttribute($featured){
        return asset($featured);
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    protected  $dates = ['deleted_at'];
    protected $fillable = [
        'title', 'content', 'category_id','featured','slug'
    ];
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
