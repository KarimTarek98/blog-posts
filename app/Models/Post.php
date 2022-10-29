<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'excerpt', 'body'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeSearch($q, array $filters)
    {
        $q->when($filters['search'] ?? false,
            fn($q, $search) =>
                $q->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%'))
    );

        $q->when($filters['category'] ?? false, fn($query, $category) =>

            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $q->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($q) => $q->where('username', $author))
        );

    }
}
