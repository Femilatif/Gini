<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orderlist extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['order_id', 'product_id', 'qty'];

    protected $searchableFields = ['*'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
