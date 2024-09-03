<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceContent extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'sub_title'];

    public function serviceFeatures()
    {
        return $this->hasMany(serviceFeatures::class, 'service_id');
    }
}
