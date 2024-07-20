@extends('client.layouts.master')

@php
    $categoryForMenu = DB::table('categories')->select('id', 'name')->get();
    $tags = DB::table('tags')->select('tags.id as t_id', 'tags.name as t_name')->get();
@endphp
@section('content')
    <section class="section">
        <div class="py-4"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8  mb-5 mb-lg-0">
                    <h1 class="h2 mb-4">Danh Mục: <mark>{{ $post[0]->c_name }}</mark></h1>
                    @foreach ($post as $post)
                        <article class="card mb-4">
                            <div class="post-slider">
                                <img src="/client/{{ $post->p_img_thumnail }}" class="card-img-top" alt="post-thumb">
                            </div>
                            <div class="card-body">
                                <h3 class="mb-3"><a class="post-title" href="{{ url('post/' . $post->p_id) }}">{{ $post->p_title }}</a>
                                </h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="author-single.html" class="card-meta-author">
                                            <img src="/client/{{ $post->au_avatar }}">
                                            <span>{{ $post->au_name }}</span>
                                        </a>
                                    </li>

                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i>{{ $post->p_updated_at }}
                                    </li>

                                </ul>
                                <p>{{ $post->p_excerpt }}</p>
                                <a href="{{ url('post/' . $post->p_id) }}" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <aside class="col-lg-4 sidebar-inner">
                    <!-- Search -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Tìm Kiếm</span></h4>
                        <form action="#!" class="widget-search">
                            <input class="mb-3" id="search-query" name="s" type="search"
                                placeholder="Nhập &amp;Tìm Kiếm...">
                            <i class="ti-search"></i>
                            <button type="submit" class="btn btn-primary btn-block">Tìm Kiếm</button>
                        </form>
                    </div>

                    <!-- about me -->


                    <!-- Promotion -->

                    <!-- authors -->

                    <!-- Search -->



                    <!-- categories -->
                    <div class="widget widget-categories">
                        <h4 class="widget-title"><span>Danh Mục</span></h4>
                        <ul class="list-unstyled widget-list">
                            @foreach ($categoryForMenu as $category)
                                <li>
                                    <a href="tags.html" class="d-flex">{{ $category->name }}</a>
                                </li>
                            @endforeach


                        </ul>
                    </div><!-- tags -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Thẻ</span></h4>
                        <ul class="list-inline widget-list-inline widget-card">
                            @foreach ($tags as $tag)
                                <li class="list-inline-item"><a href="tags.html">{{ $tag->t_name }}</a></li>
                            @endforeach


                        </ul>
                    </div><!-- recent post -->
                    <div class="widget">
                        <h4 class="widget-title">Bài Đăng Gần Đâyt</h4>

                        <!-- post-item -->

                        @foreach ($postTop3LatestOnHome as $post)
                            <article class="widget-card">
                                <div class="d-flex">
                                    <img class="card-img-sm" src="/client/{{ $post->p_img_thumnail }}">
                                    <div class="ml-3">
                                        <h5><a class="post-title"
                                                href="{{ url('post/' . $post->p_id) }}">{{ $post->p_title }}-
                                                {{ $post->p_id }}</a></h5>
                                        <ul class="card-meta list-inline mb-0">
                                            <li class="list-inline-item mb-0">
                                                <i class="ti-calendar"></i>{{ $post->p_updated_at }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        @endforeach


                    </div>

                    <!-- Social -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Liên Kết</span></h4>
                        <ul class="list-inline widget-social">
                            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
                        </ul>
                    </div>
                </aside>

            </div>
        </div>
    </section>
@endsection
