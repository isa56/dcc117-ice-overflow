<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class PostsComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'vote',
        'best_answer',
        'user_id',
        'post_id',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

}
