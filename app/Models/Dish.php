<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $fillable = [
         'd_name','d_desc','d_cat_id','d_price','d_image','d_quantity'     
    ];


    public function dish_category(): BelongsTo
    {
         return $this->belongsTo(DishCategory::class);
    }
}
