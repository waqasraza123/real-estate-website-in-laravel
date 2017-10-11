<?php namespace didcode\Blog\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent {
    protected $table = 'didcode_blog_posts';
    protected $fillable = ['post_status', 'title', 'slug', 'chapo', 'content', 'published_at', 'category_id' , 'tag_id'];

    function getUrlAttribute($value) {
        return config('blog.base_path').$this->slug.'/';
    }

    function getPubDateAttribute($value) {
        return $this->created_at->format('D, d M Y H:i:s O');
    }

    function scopeIsPublished($query) {
        return $query->where('post_status','!=','draft');
    }

    function is_published() {
        return ($this->published_at !== null);
    }

    function Category() {
        return $this->hasOne('didcode\Blog\Models\Category', 'id', 'category_id');
    }

    function getImageAttribute($value) {
        if ($value == '') {
            return config('blog.default_image');
        }
        return '/img/posts/'.$value;
    }

}
