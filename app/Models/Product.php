<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'price',
        'qty',
        'shop_id',
        'country',
        'state',
        'category_id',
        'description',
        'city',
        'seller_id',
        'img',
    ];

    protected $searchableFields = ['*'];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderlists()
    {
        return $this->hasMany(Orderlist::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
