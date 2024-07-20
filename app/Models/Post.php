<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'author_id',
        'title',
        'excerpt',
        'img_thumnail',
        'img_cover',
        'content',
        'is_trending',
        'view_count',
        'status',
    ];

    public function postTopViewOnHome($id)
    {
        $result = DB::table('posts as p')
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
            ->orderBy('p.view_count', 'DESC')
            ->limit(1)
            ->first();

        return $result;
    }
}
