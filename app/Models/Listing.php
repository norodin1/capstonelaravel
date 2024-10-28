<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = [
        'itemName',
        'itemPrice',
        'category',
        'stock',
        'description',
        'image'
    ];
}
