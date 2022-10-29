<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relations

    public function vehicleMake(): BelongsTo
    {
        return $this->belongsTo(VehicleMake::class, 'make_id');
    }

    public function vehicleModel(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class, 'model_id');
    }

    public function prices(): HasMany
    {
        return $this->hasMany(VehiclePrice::class);
    }

    //Accessors

    public function getCurrentPriceAttribute()
    {
        return $this->prices()->orderBy('created_at', 'DESC')->take(1)->first()?->price ?? null;
    }

    //Mutators

    //Functions
}
