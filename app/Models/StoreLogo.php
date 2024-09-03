<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreLogo extends Model
{
    use HasFactory;
    protected $fillable = [

        "logo","url_logo"

    ];
}
