<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function cat(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subcat(){
        return $this->belongsTo(Subcategory::class,'subcategory_id','id');
    }
}
