<?php

namespace App\Http\Controllers;

use App\Jobs\CommentEmail;
use App\Mail\BlogComment;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    /**
     * 评论博客
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Blog $blog)
    {
        $comment = $blog->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->input('content')
        ]);

        if ($comment) {
            $retData = [
                'avatar_url' => avatar(auth()->user()->avatar),
                'user_name' => auth()->user()->name,
                'content' => $request->input('content')
            ];

            // 使用邮件队列发送
            Mail::to($blog->user)->queue(new BlogComment($comment));

            return response()->api('Comment Successfully', 200, $retData);
        } else {
            return response()->api('Comment Failed', 400);
        }
    }
}
