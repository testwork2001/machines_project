<?php

namespace App\Models;

use App\Models\Category;
use App\Traits\ProductSpecs;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, ProductSpecs;
    protected $fillable = ['name', 'price', 'quantity', 'description', 'status' , 'category_id'];

    public function specs()
    {
        return $this->belongsToMany(Spec::class)->withPivot('value');
    }

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
