<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addFooter extends Model
{
    use HasFactory;

    protected $fillable = [

        "site_name","design_name","design_link"

    ];
}
