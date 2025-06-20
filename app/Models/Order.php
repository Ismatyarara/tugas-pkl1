<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $fillable =['status', 'order_code,', 'user_id', 'total_price'];



     public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty', 'price')->withTimesTamps();
        
    }

     public function user(){
        return $this->belongTo(User::class);
    }  

}
