<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        "address","email","phone","facebook_link","twitter_link","insta_link","linkedin_link","status"
    ];
}
