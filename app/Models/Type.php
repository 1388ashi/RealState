<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    protected $fillable = ['title'];

    public function sellings(): HasMany
    {
        return $this->hasMany(Selling::class,'selling_id');
    }
    public function mortgageRents(): HasMany
    {
        return $this->hasMany(MortgageRent::class,'ortgage_rent_id');
    }
}
