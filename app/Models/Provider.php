<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'locations_id', 'status', 'description', 'creted_at', 'suspended_at', 'banished_at'];

    public function location()
    {
        return $this->belongsTo(Location::class, 'locations_id');
    }

    public function responsibles()
    {
        return $this->hasMany(Responsible::class, 'providers_id');
    }
}
