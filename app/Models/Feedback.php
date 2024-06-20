<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['report_id', 'Type', 'status', 'created_at'];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
    
}
