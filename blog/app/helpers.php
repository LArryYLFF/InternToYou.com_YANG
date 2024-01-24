<?php
/**
 * 返回博客分类
 */
if (! function_exists('categories')) {
    function categories()
    {
        // 方式1: 检查key存不存在, 决定要不要查询和缓存
//        $categories = cache('categories');
//
//        if (empty($categories)) {
//            // 查询数据库
//            $categories = \Illuminate\Support\Facades\DB::table('categories')
//                ->pluck('name', 'id');
//            // 写入缓存
//            cache(['categories' => $categories]);
//        }

        // 方式2: 使用remember
        $categories = cache()->rememberForever('categories', function () {
            $categories = \Illuminate\Support\Facades\DB::table('categories')
                ->pluck('name', 'id');
            return $categories;
        });

        return $categories;
    }
}

/**
 * 返回头像地址
 */
if (! function_exists('avatar')) {
    function avatar($avatar)
    {
        $avatar_url = $avatar ? asset('storage/' . $avatar) : asset('img/default/avatar.jpg');
        return $avatar_url;
    }
}
