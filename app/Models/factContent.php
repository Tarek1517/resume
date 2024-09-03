<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factContent extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'sub_title'];

    public function factFeatures()
    {
        return $this->hasMany(factFeatures::class, 'fact_id');
    }
}
