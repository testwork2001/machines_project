<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spec extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('value');
    }
}
