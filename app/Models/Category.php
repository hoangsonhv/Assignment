<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
//    protected $id ="id"; neu la id thif ko can khai bao nuawx
    protected $fillable=["name"];
//    public $timestamps; //tu dong cap nhap create_at updated_at
    public function Products(){
        return $this->hasMany(Product::class);
    }

}
