<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Selling extends Model
{
    protected $fillable = [
        'type_id','location_id','document','area','infrastructure','floor','customer','customer_mobile','amount',
        'year_making','num_rooms','warehouse','parking','status','address','description','location_text'
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
