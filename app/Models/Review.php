<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public $fillable=['user_id', 'point', 'comment', 'product_id'];

    public function user()
    {
       return $this->belongsTo(User::class);

    }
public function product()
    {
         return $this->belongsTo(Product::class);

    }

}

