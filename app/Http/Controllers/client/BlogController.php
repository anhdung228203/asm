<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function detailPost($id = 6)
    {
        $post = DB::table('posts as p')
            ->select(
                'p.id as p_id',
                'p.category_id as p_category_id',
                'p.author_id as p_author_id',
                'p.title as p_title',
                'p.content as p_content',
                'p.excerpt as p_excerpt',
                'p.img_thumnail as p_img_thumnail',
                'p.img_cover as p_img_cover',
                'p.is_trending as p_is_trending',
                'p.status as p_status',
                'p.created_at as p_created_at',
                'p.updated_at as p_updated_at',
                'c.name as c_name',
                'au.name as au_name',
                'au.avatar as au_avatar'
            )
            ->join('categories as c', 'c.id', '=', 'p.category_id')
            ->join('authors as au', 'au.id', '=', 'p.author_id')
            ->where('p.status', 'published')
            ->where('p.id', $id)
            ->limit(1)
            ->first();


        return view('client/blog-detail', compact('post'));
    }

    public function blogListByDanhMucID($id)
    {

        $postTop3LatestOnHome = DB::table('posts as p')
            ->select(
                'p.id               as p_id',
                'p.category_id      as p_category_id',
                'p.author_id        as p_author_id',
                'p.title            as p_title',
                'p.excerpt          as p_excerpt',
                'p.img_thumnail     as p_img_thumnail',
                'p.img_cover        as p_img_cover',
                'p.is_trending      as p_is_trending',
                'p.status           as p_status',
                'p.created_at       as p_created_at',
                'p.updated_at       as p_updated_at',
                'c.name             as c_name',
                'au.name            as au_name',
                'au.avatar          as au_avatar'
            )
            ->join('categories as c', 'c.id', '=', 'p.category_id')
            ->join('authors as au', 'au.id', '=', 'p.author_id')
            ->where('p.status', 'published')
            ->orderBy('p.id', 'DESC')
            ->limit(3)
            ->get();

        $post = DB::table('posts as p')
            ->select(
                'p.id as p_id',
                'p.category_id as p_category_id',
                'p.author_id as p_author_id',
                'p.title as p_title',
                'p.content as p_content',
                'p.excerpt as p_excerpt',
                'p.img_thumnail as p_img_thumnail',
                'p.img_cover as p_img_cover',
                'p.is_trending as p_is_trending',
                'p.status as p_status',
                'p.created_at as p_created_at',
                'p.updated_at as p_updated_at',
                'c.name as c_name',
                'au.name as au_name',
                'au.avatar as au_avatar'
            )
            ->join('categories as c', 'c.id', '=', 'p.category_id')
            ->join('authors as au', 'au.id', '=', 'p.author_id')
            ->where('p.status', 'published')
            ->where('p.category_id', $id)
            ->paginate(5);

        return view('client/blog-by-category', compact('post','postTop3LatestOnHome'));
    }
}
