<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actuality extends Model
{
    use HasFactory;

    protected $fillable = ['report_id', 'type', 'title', 'content','temporaryUrl', 'is_activated_at', 'created_at'];

    protected $casts = [
        'temporaryUrl' => 'array',
    ];
    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class,'report_id');
    }
    
}
