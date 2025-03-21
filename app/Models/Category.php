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
    ];

    public function weblogs() {
        return $this->belongsToMany(Weblog::class);
    }
}
