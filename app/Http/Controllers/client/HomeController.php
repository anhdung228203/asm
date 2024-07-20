<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(Request $request)
    {

        $postTopView = DB::table('posts as p')
            ->select(
                'p.id as p_id',
                'p.category_id as p_category_id',
                'p.author_id as p_author_id',
                'p.title as p_title',
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
            ->orderBy('p.created_at', 'DESC')
            ->limit(1)
            ->first();


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

        $postTopPopular = DB::table('posts as p')
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
            ->orderBy('p.view_count', 'DESC')
            ->limit(1)
            ->first();

        $postTop10TrendingLatestOnHome = DB::table('posts as p')
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
            ->where('p.is_trending', 1)
            ->orderBy('p.id', 'DESC')
            ->limit(6)
            ->get();

        $categoryForMenu = DB::table('categories')
            ->select('id', 'name')
            ->get();

        $tags = DB::table('tags')
            ->select('tags.id as t_id', 'tags.name as t_name')
            ->get();


        // dd($postTopView);
        return view(
            'client/index',
            compact(
                'postTopView',
                'postTop3LatestOnHome',
                'postTopPopular',
                'postTop10TrendingLatestOnHome',
                'categoryForMenu',
                'tags'

            )
        );
    }

    public function searchHome(Request $request)
    {

        $keywords = $request->keyword;
        // dd($keywords);
        $data = DB::table('posts as p')
            ->select(
                'p.id as p_id',
                'p.category_id as p_category_id',
                'p.author_id as p_author_id',
                'p.title as p_title',
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
            ->where('p.title', 'like', '%' .$keywords . '%')
            ->get();


            $postTopView = DB::table('posts as p')
            ->select(
                'p.id as p_id',
                'p.category_id as p_category_id',
                'p.author_id as p_author_id',
                'p.title as p_title',
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
            ->orderBy('p.created_at', 'DESC')
            ->limit(1)
            ->first();


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

        $postTopPopular = DB::table('posts as p')
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
            ->orderBy('p.view_count', 'DESC')
            ->limit(1)
            ->first();

        $postTop10TrendingLatestOnHome = DB::table('posts as p')
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
            ->where('p.is_trending', 1)
            ->orderBy('p.id', 'DESC')
            ->limit(6)
            ->get();

        $categoryForMenu = DB::table('categories')
            ->select('id', 'name')
            ->get();

        $tags = DB::table('tags')
            ->select('tags.id as t_id', 'tags.name as t_name')
            ->get();


        // dd($postTopView);
     


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
