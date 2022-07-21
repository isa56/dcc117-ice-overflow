<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PostsComment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'materia',
        'comentarios',
        'vote',
        'finished',
        'user_id',
    ];
    
    protected $casts = [
        'finished' => 'boolean',
    ];

    public function comments() 
    {
        return $this->hasMany(PostsComment::class);
    }

    /*
    public function numberOfComments()
    {
        return count($this->hasMany(PostsComment::class)?->get());
    }
    */

}
