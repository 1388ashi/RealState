<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Facilitie extends Model
{
    protected $fillable = ['title'];
    public function sellings(): BelongsToMany
    {
        return $this->belongsToMany(Selling::class,'selling_id');
    }
    public function mortgageRents(): BelongsToMany
    {
        return $this->belongsToMany(MortgageRent::class,'ortgage_rent_id');
    }
}
