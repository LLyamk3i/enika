<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['sector_id', 'name', 'description'];

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'category_id');
    }

    public function incidentPreferences()
    {
        return $this->hasMany(IncidentPreference::class, 'incident_category_id');
    }
}
