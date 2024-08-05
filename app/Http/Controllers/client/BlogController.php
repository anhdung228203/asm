<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function detailPost($id = 6)
    {
        $post = Post::with(['category', 'author', 'tags'])
            ->where('status', 'published')
            ->where('id', $id)
            ->orderByDesc('created_at')
            ->limit(1)
            ->first();

        return view('client/blog-detail', compact('post'));
    }

    public function blogListByDanhMucID($id)
    {

        $posts = Post::with(['category', 'author', 'tags'])
            ->where('status', 'published')
            ->where('category_id', $id)
            ->orderByDesc('created_at')
            ->latest('id')
            ->paginate(2);

        $postTop3LatestOnHome = Post::with(['category', 'author', 'tags'])
            ->where('status', 'published')
            ->orderByDesc('id')
            ->limit(3)
            ->get();

        $categoryForMenu = Category::all();
        $tags = Tag::all();

        return  view(
            'client.blog-by-category',
            compact(
                'posts',
                'postTop3LatestOnHome',
                'tags',
                'categoryForMenu'
            )
        );
    }
}
