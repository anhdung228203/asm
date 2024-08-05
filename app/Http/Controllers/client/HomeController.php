<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $postTopView = Post::with(['category', 'author', 'tags'])
            ->where('status', 'published')
            ->orderByDesc('created_at')
            ->limit(1)
            ->first();

        $postTop3LatestOnHome = Post::with(['category', 'author', 'tags'])
            ->where('status', 'published')
            ->orderByDesc('id')
            ->limit(3)
            ->get();

        $postTopPopular = Post::with(['category', 'author', 'tags'])
            ->where('status', 'published')
            ->orderByDesc('view_count')
            ->limit(1)
            ->first();

        $postTop10TrendingLatestOnHome = Post::with(['category', 'author', 'tags'])
            ->where('status', 'published')
            ->where('is_trending', 1)
            ->orderByDesc('id')
            ->limit(6)
            ->get();

        $categoryForMenu = Category::all();
        $tags = Tag::all();


        // dd($postTopView);
        return view(
            'client/index',
            compact(
                'postTopView',
                'postTop3LatestOnHome',
                'postTopPopular',
                'postTop10TrendingLatestOnHome',
                'tags',
                'categoryForMenu'

            )
        );
    }

    public function searchHome(Request $request)
    {

        $keywords = $request->keyword;
        // dd($keywords);

        $data = Post::with(['category', 'author', 'tags'])
            ->where('title', 'like', '%' . $keywords . '%')
            ->get();

        $postTopView = Post::with(['category', 'author', 'tags'])
            ->where('status', 'published')
            ->orderByDesc('created_at')
            ->limit(1)
            ->first();

        $postTop3LatestOnHome = Post::with(['category', 'author', 'tags'])
            ->where('status', 'published')
            ->orderByDesc('id')
            ->limit(3)
            ->get();

        $postTopPopular = Post::with(['category', 'author', 'tags'])
            ->where('status', 'published')
            ->orderByDesc('view_count')
            ->limit(1)
            ->first();

        $postTop10TrendingLatestOnHome = Post::with(['category', 'author', 'tags'])
            ->where('status', 'published')
            ->where('is_trending', 1)
            ->orderByDesc('id')
            ->limit(6)
            ->get();

        $categoryForMenu = Category::all();
        $tags = Tag::all();

        return view('client/search',   compact(
            'postTopView',
            'postTop3LatestOnHome',
            'postTopPopular',
            'postTop10TrendingLatestOnHome',
            'categoryForMenu',
            'tags',
            'data'
        ));
    }
}
