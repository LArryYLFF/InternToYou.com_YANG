<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * 可以批量赋值的字段
     */
    protected $fillable = ['user_id', 'blog_id', 'content'];

    /**
     * 评论所属博客
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }

    /**
     * 评论所属用户
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
