<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishCategory extends Model
{
    use HasFactory;


    protected $fillable = [

        'd_c_name','d_c_description'

    ];



    public function dish(): HashMany
    {
        return $this->hasMany(Dish::class);
    }
}
