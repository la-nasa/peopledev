<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'client',
        'project_date',
        'project_url',
        'order',
        'is_active'
    ];

    protected $casts = [
        'project_date' => 'date',
        'is_active' => 'boolean'
    ];

    // Relation avec les catégories (si vous voulez une table séparée plus tard)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}