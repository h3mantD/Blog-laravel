<?php

namespace App\Models;

use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogPost extends Model
{
    use HasFactory;

    public function comments() {
        return $this->hasMany(Comment::class)->srt();
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // local query scope
    public function scopeSrt(Builder $builder) {
        return $builder->orderBy(static::CREATED_AT, 'desc');
    }

    public function scopeMostCommented(Builder $builder) {
        return $builder->withCount('comments')->orderBy('comments_count', 'desc');
    }

    public static function boot() {
        parent::boot();

        // adding global query scope
        //static::addGlobalScope(new LatestScope);


        static::deleting(function (BlogPost $blogPost) {
            $blogPost->comments()->delete();
        });
    }
}
