<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','description','category_id','price','status','image'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function getImageUrlAttribute(){
        $imageUrl = '';

        if(!is_null($this->image)){
            $directory = config('img.image.directory');
            $imagePath = public_path()."/{$directory}/".$this->image;
            if(file_exists($imagePath)) {
                $imageUrl = asset("{$directory}/".$this->image);
            }
            else{
                $imageUrl = "http://placehold.it/500x500";
            }
        }

        return $imageUrl;
    }
}
