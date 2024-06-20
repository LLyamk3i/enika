<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'téléphone', 'justification', 'locations_id', 'status', 'accetpted_at', 'rejected_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'locations_id');
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class, 'group_id');
    }

    public function incidentPreferences()
    {
        return $this->hasMany(IncidentPreference::class, 'group_id');
    }
}
