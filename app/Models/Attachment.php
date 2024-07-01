<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['report_id', 'file_path', 'file_type', 'collection', 'disk', 'categorie', 'created_at'];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function actuality()
    {
        return $this->belongsTo(Actuality::class, );
    }
    
}
