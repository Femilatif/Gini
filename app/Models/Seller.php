<?php

namespace App\Models;


use App\Models\Product;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Seller extends Authenticatable
{
    use HasFactory;
    use Searchable;
    use Notifiable;

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'address',
        'shop_name',
        'shop_address',
        'shop_number',
        'country',
        'status',
        'allow_inter',
        'password',
        'remember_token'
    ];

    protected $searchableFields = ['*'];
    
    protected $hidden = ['password', 'remember_token'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
