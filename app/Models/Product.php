<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    /**
     * users()-> this returns all the users by a product.
     * $fillable: prevents mass assignments vulnerability
     *
     */


    protected $fillable = [
    'name',
    'price',
    'quantity',
    'serial_number',
    'user_id',
    'description',
    'sold',
    'category_id',
    'added_cart'
];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    //creating a filter scope for searching a product

    public function scopeFilter($query)
    {
        //check if the user try to search for a product
        if (request('search')) {
                $query->where('serial_number', 'like', '%' . request('search') . '%')->with(['category']);
            }
        }
    use HasFactory;
    }
