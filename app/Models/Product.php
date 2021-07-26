<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable=[
        "name",
        "image",
        "description",
        "price",
        "qty",
        "category_id",
        "brand_id",
    ];
    public function Category(){
//        return $this->belongsTo(Category::class,"category_id");
        return $this->belongsTo(Category::class);
    }
    public function Brand(){
        return $this->belongsTo(Brand::class);
    }
    public function GetImg(){
        if ($this->image){
            return asset("upload/".$this->image);

        }
        return null;
    }
}

