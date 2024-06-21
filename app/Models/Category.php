<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['sector_id', 'name', 'description'];

    /**
 * Get the sector that the category belongs to.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 *
 * @throws \Exception
 */
public function sector()
{
    return $this->belongsTo(Sector::class, 'sector_id');
}

    /**
 * Get all reports associated with the category.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 *
 * @throws \Exception
 */
public function reports()
{
    return $this->hasMany(Report::class, 'category_id');
}

    /**
 * Get all incident preferences associated with the category.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 *
 * @throws \Exception
 *
 * @param string $incident_category_id The foreign key in the IncidentPreference table
 *                                   that references the id of the category.
 */
public function incidentPreferences()
{
    return $this->hasMany(IncidentPreference::class, 'incident_category_id');
}
}
