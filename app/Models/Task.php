<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';

    protected $fillable = [
        'title',
        'description',
        'deadline',
        'category_id', 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'task_tag');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); 
    }
}

