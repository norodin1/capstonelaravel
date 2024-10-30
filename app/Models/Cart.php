<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Listing;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'itemId',
        'userId',
        'qty'
    ];
    public function itemDetails(): HasOne
    {
        return $this->hasOne(Listing::class, 'id', 'itemId');
    }
}
