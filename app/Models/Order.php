<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'status', 'order_number'];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderlists()
    {
        return $this->hasMany(Orderlist::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }
}
