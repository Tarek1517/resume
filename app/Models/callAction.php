<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class callAction extends Model
{
    protected $fillable = [
        "title","action_description","bg_img","status"
    ];
}

