<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'image',
        'stock',
        'description',
        'price',
    ];


    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
