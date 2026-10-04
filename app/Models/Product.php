<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id','name','slug','sku','tagline',
        'short_description','description','ingredients',
        'benefits','brewing_guide','main_image',
        'price','mrp','stock','total_bags','herb_count',
        'theme_color','is_active','is_featured',
        'avg_rating','total_reviews','meta_title','meta_description',
    ];

    protected $casts = [
        'price'       => 'float',
        'mrp'         => 'float',
        'avg_rating'  => 'float',
        'is_active'   => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->where('is_approved', true);
    }

    public function getDiscountPercentAttribute(): int
    {
        if ($this->mrp && $this->mrp > $this->price) {
            return (int) round((($this->mrp - $this->price) / $this->mrp) * 100);
        }
        return 0;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
