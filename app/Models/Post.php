<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'body'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->HasMany(Like::class);
    }

    public function likedBy(User $user){
            return $this->likes->contains("user_id",$user->id);
    }

    public function ownedBy(User $user){
        return $user->id === $this->user_id;
    }

}
