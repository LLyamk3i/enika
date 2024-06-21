<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'locations_id', 'status', 'description', 'creted_at', 'suspended_at', 'banished_at'];

    /**
     * Get the location record associated with the provider.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @throws \Exception
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'locations_id');
    }

    /**
     * Get the responsible records associated with the provider.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @throws \Exception
     */
    public function responsibles()
    {
        return $this->hasMany(Responsible::class, 'providers_id');
    }
}
