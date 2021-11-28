<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(ShoppingItem::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function periods()
    {
        return $this->belongsToMany(Category::class)->wherePivot('categories.type', 'era');
    }

    public function materials()
    {
        return $this->belongsToMany(Category::class)->wherePivot('categories.type', 'material');
    }

    public function furniture()
    {
        return $this->belongsToMany(Category::class)->wherePivot('categories.type', 'furniture');
    }

    public function colors()
    {
        return $this->belongsToMany(Category::class)->wherePivot('categories.type', 'color');
    }

    public function rooms()
    {
        return $this->belongsToMany(Category::class)->wherePivot('categories.type', 'room');
    }

    public function periods_str()
    {
        return $this->periods()->get()->pluck('name')->implode(', ');
    }

    public function materials_str()
    {
        return $this->materials()->get()->pluck('name')->implode(', ');
    }

    public function furniture_str()
    {
        return $this->furniture()->get()->pluck('name')->implode(', ');
    }

    public function colors_str()
    {
        return $this->colors()->get()->pluck('name')->implode(', ');
    }

    public function rooms_str()
    {
        return $this->rooms()->get()->pluck('name')->implode(', ');
    }
}
