<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'product_id',
        'qty',
        'price',
        'user_id',
        'status',
        'order_id',
        'seller_id',
    ];

    protected $searchableFields = ['*'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
