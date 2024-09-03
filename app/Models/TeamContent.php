<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamContent extends Model
{
    protected $fillable = [
        "name","designation","person_img","facebook_link","twitter_link","insta_link","linkedin_link","status"
    ];
}
