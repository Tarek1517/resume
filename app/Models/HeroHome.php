<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroHome extends Model
{
    protected $fillable = [
        "title","sub_title","bg_img","resume","status"
    ];
}
