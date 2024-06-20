<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsible extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'providers_id', 'roles'];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'providers_id');
    }
}
