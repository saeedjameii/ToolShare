<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Post extends Model
{

    protected $guarded = ['id'];
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}
