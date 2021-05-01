<?php

namespace App\Models;

use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function blogPost() {
        return $this->belongsTo(BlogPost::class, 'blog_post_id');
    }

    // local query scope
    public function scopeSrt(Builder $builder) {
        return $builder->orderBy(static::CREATED_AT, 'desc');
    }   

    public static function boot() {
        parent::boot();

        //static::addGlobalScope(new LatestScope);
    }

}
