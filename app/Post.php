<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Post extends Model
{
    use Translatable;

    public $translatedAttributes = ['title','body'];
    protected $guarded=[];
    protected $appends=['image_path'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getTitleAttribute($value){
        return ucfirst($value);
    }


    public function getImagePathAttribute(){
        return asset('uploads/post_images/'.$this->image);
    }
}
