<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * 实例化一个新的控制器实例
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * 添加博客的页面
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * 执行博客的添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $request->offsetSet('user_id', auth()->id());
        $res = Blog::create($request->except(['_token']));

        if ($res) {
            return back()->with(['success' => 'Published Successfully']);
        } else {
            return back()->withErrors('添加失败')->withInput();
        }
    }

    /**
     * 查看一条博客详情
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::with('comments.user')->where('id', $id)->first();
        $blog->timestamps = false;
        $blog->increment('view');
        $blog->timestamps = true;
        return view('blog.show', ['blog' => $blog]);
    }

    /**
     * 编辑页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', ['blog' => $blog]);
    }

    /**
     * 执行更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {

        // 方式2
        $blog->fill($request->except(['_token', '_method']));
        $blog->save();

        if ($blog) {
            return back()->with(['success' => 'Update Successfully!']);
        } else {
            return back()->withErrors('Update Failed!');
        }
    }

    /**
     * 删除博客
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        // 使用模型事件, 删除博客时, 自动删除相关评论
        $res = $blog->delete();
        if ($res) {
            return response()->api('Delete Successfully');
        } else {
            return response()->api('Delete Failed', 400);
        }
    }

    /**
     * 修改博客状态
     *
     * @param int $id
     */
    public function status(Blog $blog)
    {
        $blog->timestamps = false;
        $blog->status = $blog->status == 1 ? 0 : 1;
        $res = $blog->save();
        if ($res) {
            $msg = $blog->status == 1 ? 'Published Successfully!' : 'Unpublished！';
            return response()->api($msg);
        } else {
            return response()->api('Delete Failed', 400);
        }
    }
}
