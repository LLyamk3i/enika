<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAgent extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'locations_id', 'pseudo', 'avatar'];

    /**
     * Get the user that owns the UserAgent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the location associated with the UserAgent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 
     * @throws \Exception If the related model does not exist.
     * 
     * @see https://laravel.com/docs/8.x/eloquent-relationships#one-to-many-inverse
     * 
     * @since 1.0.0
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'locations_id');
    }
}
