<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    /**
     * users()-> this returns all the users by a product.
     *
     */
    protected $fillable=['name','price','quantity','serial_number','user_id','description','sold'];

     public function users(){
        return $this->belongsTo(User::class,'user_id');
     }
    use HasFactory;
}
