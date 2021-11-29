<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function filters() 
    {
        return [
            'era' => Category::where('type', 'era')->get(),
            'material' => Category::where('type', 'material')->get(),
            'furniture' => Category::where('type', 'furniture')->get(),
            'color' => Category::where('type', 'color')->get(),
        ];
    } 

    public function filter_names()
    {
        return [
            'era' => 'Historické obdobie',
            'material' => 'Materiál',
            'furniture' => 'Druh nábytku',
            'color' => 'Farba',
        ];
    }
}
