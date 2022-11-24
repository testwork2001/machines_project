<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable implements HasMedia 
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    protected $fillable = ['name', "email" ,'status' , 'email_verified_at' , "password" ];
}
