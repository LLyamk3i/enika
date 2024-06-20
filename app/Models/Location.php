<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['city', 'prefecture', 'township'];

    public function groupes()
    {
        return $this->hasMany(Groupe::class, 'locations_id');
    }

    public function providers()
    {
        return $this->hasMany(Provider::class, 'locations_id');
    }

    public function userAgents()
    {
        return $this->hasMany(UserAgent::class, 'locations_id');
    }
}
