<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'path',
        'document_type_id',
        'canine_id',
        'user_id'
    ];

    public function documentTypes()
    {
        return $this->belongsTo(DocumentTypes::class);
    }

    public function canine()
    {
        return $this->belongsTo(Canine::class);
    }
}
