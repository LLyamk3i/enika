<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'location_geo', 'description', 'acepted_at', 'completed_at', 'validated_at', 'enty_type', 'entity_id', 'status', 'report_date'];

    /**
     * Get the user that owns the report.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'report_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'report_id');
    }

    public function performanceEvaluations()
    {
        return $this->hasMany(PerformanceEvaluation::class, 'report_id');
    }

    public function actualities()
    {
        return $this->hasMany(Actuality::class, 'report_id');
    }
}
