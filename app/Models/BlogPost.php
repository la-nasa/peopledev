<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'author',
        'publish_date',
        'is_published'
    ];

    protected $casts = [
        'publish_date' => 'date',
        'is_published' => 'boolean'
    ];

    // Génération automatique du slug
    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });

        static::updating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    // Relation avec les catégories (si vous voulez une table séparée plus tard)
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_post_categories');
    }
}