<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['name', 'image'];

    public function categories()
    {
        return $this->belongsToMany(PortfolioCategories::class, 'portfolio_category_relation', 'portfolio_id', 'portfolio_category_id');
    }
}
