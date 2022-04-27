<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppConfig extends Model
{
    protected $fillable = ["logo", "name","description","address","telephone","mobile","splashScreen"];
    use HasFactory;
}
