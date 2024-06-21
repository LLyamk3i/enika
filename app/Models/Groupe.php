<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'téléphone', 'justification', 'locations_id', 'status', 'accetpted_at', 'rejected_at'];

    /**
     * Get the user that owns the groupe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the location record associated with the groupe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @param  string  $related  The related model class name.
     * @param  string  $foreignKey  The foreign key of the parent model.
     * @param  string  $localKey  The local key of the parent model.
     *
     * @throws \Exception  If the related model class does not exist.
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'locations_id');
    }

    /**
     * Get all memberships associated with the groupe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @throws \Exception  If the related model class does not exist.
     */
    public function memberships()
    {
        return $this->hasMany(Membership::class, 'group_id');
    }

    /**
     * Get all incident preferences associated with the groupe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @throws \Exception  If the related model class does not exist.
     *
     * @param  string  $related  The related model class name.
     * @param  string  $foreignKey  The foreign key of the parent model.
     * @param  string  $localKey  The local key of the parent model.
     */
    public function incidentPreferences()
    {
        return $this->hasMany(IncidentPreference::class, 'group_id');
    }
}
