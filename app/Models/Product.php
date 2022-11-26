<?php

namespace App\Models;

use App\Models\Spec;
use App\Models\Inquiry;
use App\Models\Category;
use App\Traits\ProductSpecs;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, ProductSpecs ;
    protected $fillable = ['name', 'price', 'quantity', 'description', 'status' , 'category_id' ,'slug'];

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
