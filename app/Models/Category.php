<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $fillable =['name','slug'];

    //relasi one to many
    public function product(){
        return $this->hasMany(product::class);
    }
}
