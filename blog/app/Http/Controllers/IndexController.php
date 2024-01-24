<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * 博客首页
     */
    public function index(Request $request)
    {
        // 搜索关键字
        $keyword = $request->query('keyword'); // $request->input('keyword') $request->keyword

        // 获取分类id
        $category_id = $request->query('category_id');

        // 查询博客数据
        $blogs = Blog::when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('title', 'like', "%{$keyword}%")
                    ->orWhere('content', 'like', "%{$keyword}%");
            });
        })
            ->when($category_id, function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            })
            ->with('user:id,name')
            ->where('status', 1)
            ->orderBy('updated_at', 'desc')
            //一页显示几条内容
            ->paginate(8);

        return view('index.index', ['blogs' => $blogs]);
    }
}
