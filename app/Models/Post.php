<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;


class Post extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'content',
        'user_id',
    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    public function isLikedByUser(): bool
    {
        if (!auth()->check()) {
            return false;
        }
        return $this->likes()->where('user_id', auth()->id())->exists();
    }
}
