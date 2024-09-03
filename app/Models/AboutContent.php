<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'image_path'];

    public function aboutFeatures()
    {
        return $this->hasMany(AboutFeatures::class, 'about_id');
    }

}
