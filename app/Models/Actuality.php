<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actuality extends Model
{
    use HasFactory;

    protected $fillable = ['report_id', 'type', 'title', 'content', 'is_activated_at', 'created_at'];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
    
}
