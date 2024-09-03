<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factFeatures extends Model
{
    use HasFactory;
    protected $fillable = ['fact_id', 'count_title', 'count_subTitle'];

    public function factList()
    {
        return $this->belongsTo(factContent::class);
    }
}
