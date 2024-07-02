<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
     protected $table = "categories";
     protected $primaryKey = 'id';
     protected $fillable = [
        'name',
        'status',
     ];


   

    public function Products(){
        return $this->hasMany(Product::class, 'cat_id');
    }

    use HasFactory;
}
