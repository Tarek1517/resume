<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategories extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'Slug'];

    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class, 'portfolio_category_relation', 'portfolio_category_id', 'portfolio_id');
    }
    
}
