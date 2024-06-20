<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moderator extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'entity_type', 'entity_id', 'status', 'block_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
