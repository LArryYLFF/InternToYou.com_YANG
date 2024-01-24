<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /**
     * 允许批量赋值的字段
     */
    protected $fillable = ['user_id', 'title', 'content', 'category_id'];

    /**
     * 博客所属的用户
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * 博客属于哪个分类
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * 博客拥有的评论
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id', 'id');
    }

}
