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
    ];

    public function weblog () {
        return $this->belongsTo(User::class);
    }
}
