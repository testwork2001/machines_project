<?php

namespace App\Models;

use App\Models\Inquiry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status' , "email" , 'phone'];

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }
}
