<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Weblog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'premium',
        'image',
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function categories () {
        return $this->belongsToMany(Category::class);
    }

    public function comments () {
        return $this->hasMany(Comment::class);
    }
}
