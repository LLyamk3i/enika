<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = ['ministries_id', 'name', 'description'];

    public function ministry()
    {
        return $this->belongsTo(Ministry::class, 'ministries_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'sector_id');
    }
}
