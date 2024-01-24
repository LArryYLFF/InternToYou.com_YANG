<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * 个人信息页面
     */
    public function infoPage()
    {
        return view('user.info');
    }

    /**
     * 个人信息-执行修改
     */
    public function infoUpdate(UserRequest $request)
    {

        $name = $request->input('name');
        $email= $request->input('email');

        $uid = auth()->id();

        // 更新用户数据
        $res = DB::table('users')
            ->where('id', $uid)
            ->update(['name' => $name, 'email' => $email]);

        if ($res) {
            return back()->with(['success' => 'Update Successfully!']);
        } else {
            return back()->with(['warning' => 'Unchanged!']);
        }
    }

    /**
     * 头像页面
     */
    public function avatarPage()
    {
        return view('user.avatar');
    }

    /**
     * 头像-执行修改
     */
    public function avatarUpdate(Request $request)
    {
        // 快速验证
        $validatedData = $request->validate([
            'avatar' => 'required|image',
        ], [ // 自定义消息
            'avatar.required' => 'Please select a picture',
            'avatar.image' => 'Please select a picture format',
        ]);

        // 获取上传的文件
        $file = $request->file('avatar');

        // 指定磁盘使用public
        $path = $file->store('avatar', 'public');

        // 在更新之前获取用户原有头像
        $oldAvatar = auth()->user()->avatar;

        // 更新当前登录用户的头像
        $uid = auth()->id();
        $res = DB::table('users')
            ->where('id', $uid)
            ->update(['avatar' => $path]);

        if ($res) {
            // 用户头像更新之后, 删除用户原有的头像
            Storage::disk('public')->delete($oldAvatar);

            return back()->with(['success' => 'Avatar updated successfully.']);
        } else {
            return back()->withErrors('Avatar not updated');
        }
    }

    /**
     * 我的所有博客
     */
    public function blog()
    {
        // 查询用户所有博客
        $blogs = auth()
            ->user()
            ->blogs()
            ->withCount('comments')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        return view('user.blog', ['blogs' => $blogs]);
    }
}
