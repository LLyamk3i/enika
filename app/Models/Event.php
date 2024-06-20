<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'title', 'description', 'enty_type', 'entity_id', 'event_date', 'is_active'];

    public function report()
    {
        return $this->belongsTo(Report::class, 'entity_id');
    }
    
}
