<?php

namespace App\Models;

use App\Models\Weblog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function weblogs () {
        return $this->hasMany(Weblog::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}
