<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardAccessKey extends Model
{
    use HasFactory;

    protected $fillable = ['actor_id', 'actor_type', 'contraint_acess', 'value', 'label', 'status', 'created_at'];

    public function ministry()
    {
        return $this->belongsTo(Ministry::class, 'actor_id');
    }
    
}
