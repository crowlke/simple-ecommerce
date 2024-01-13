<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use Filterable;
    use Sortable;

    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock_quantity',
        'image',
    ];

    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class, 'order_items')->withPivot('quantity');
    }
   
    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
}
