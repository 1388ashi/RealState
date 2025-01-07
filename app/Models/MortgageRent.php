<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MortgageRent extends Model
{
    protected $fillable = [
        'type_id','location_id','area','floor','customer','customer_mobile','mortgage_amount','rent_amount',
        'address','description','num_rooms','tenant','location_text','door','warehouse','parking','status',
    ];
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facilitie::class);
    }
}
