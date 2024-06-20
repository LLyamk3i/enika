<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentPreference extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'incident_category_id', 'created_at', 'updated_at'];

    public function group()
    {
        return $this->belongsTo(Groupe::class, 'group_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'incident_category_id');
    }
    
}
