<?php

namespace App\Models;

use App\Scopes\DeletedAdminScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

class BlogPost extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function scopeLatest(Builder $query){
        return $query->orderBy(static::CREATED_AT, 'desc');
    }

    public function scopeMostCommented(Builder $query){
        return $query->withCount('comments')->orderBy('comments_count','desc');
    }

    public static function boot(){
        static::addGlobalScope(new DeletedAdminScope);
        parent::boot();

        static::updating(function (BlogPost $blogPost) {
            Cache::forget("blog-post-{$blogPost->id}");
        });

        static::deleting(function (BlogPost $blogPost) {
            $blogPost->comments()->delete();
        });

        static::restoring(function (BlogPost $blogPost) {
            $blogPost->comments()->restore();
        });
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

}
