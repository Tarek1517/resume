<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceFeatures extends Model
{
    use HasFactory;
    protected $fillable = ['service_id', 'features_title', 'features_description', 'features_icon'];

    public function aboutList()
    {
        return $this->belongsTo(serviceContent::class);
    }
}
