<?php

namespace App\Models;

use App\Models\Weblog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'weblog_id',
        'user_id',
    ];

    public function weblog () {
        return $this->belongsTo(Weblog::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}
