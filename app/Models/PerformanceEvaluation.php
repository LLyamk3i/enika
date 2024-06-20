<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceEvaluation extends Model
{
    use HasFactory;

    protected $fillable = ['report_id', 'user_id', 'value', 'message'];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
