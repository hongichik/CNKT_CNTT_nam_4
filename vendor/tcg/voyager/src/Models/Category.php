<?php

namespace TCG\Voyager\Models;

use TCG\Voyager\Models\Post;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'categories';

    protected $fillable = ['slug', 'name'];

    public function posts()
    {
        return $this->hasMany(Voyager::modelClass('Post'))
            ->published()
            ->orderBy('created_at', 'DESC');
    }

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }
    public function Pages()
    {
        return $this->belongsToMany(Page::class, 'page_category', 'category_id', 'page_id')->select(['title', 'slug', 'id']);
    }
    public function PostMany()
    {
        return $this->belongsToMany(Post::class, 'post_category', 'category_id', 'post_id');
    }
}
