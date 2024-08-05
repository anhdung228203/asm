@extends('client.layouts.master')

@section('content')
    <div class="banner text-center">
        @include('client.layouts.partials.banner')
    </div>


    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 mb-5 mb-lg-0">
                    <h2 class="h5 section-title">Kết quả tìm kiếm</h2>
                    <div class="row">
                        @foreach ($data as $post)
                            <div class="col-lg-6 col-sm-6">
                                <article class="card mb-4">
                                    <div class="post-slider slider-sm">
                                        <img src="{{ asset('/theme/client/' . $post->img_thumnail) }}" class="card-img-top"
                                            alt="post-thumb">

                                    </div>
                                    <div class="card-body">
                                        <h3 class="h4 mb-3">
                                            <a class="post-title"href="{{ url('post/' . $post->id) }}">
                                                {{ $post->title }} - {{ $post->id }}
                                            </a>
                                        </h3>
                                        <ul class="card-meta list-inline">
                                            <li class="list-inline-item">
                                                <a href="author-single.html" class="card-meta-author">
                                                    <img src="/client/{{ $post->author->avatar }}" alt="John Doe">
                                                    <span>{{ $post->author->name }}</span>
                                                </a>
                                            </li>

                                        </ul>
                                        <p>{{ $post->excerpt }}</p>
                                        <a href="{{ url('post/' . $post->id) }}" class="btn btn-outline-primary">
                                            Đọc Thêm
                                        </a>
                                    </div>
                                </article>
                            </div>
                        @endforeach

                    </div>
                </div>
                <aside class="col-lg-4 @@sidebar">
                    <!-- Search -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Tìm Kiếm</span></h4>
                        <form action="{{ URL::to('/search') }}" class="widget-search" method="POST">
                            {{ csrf_field() }}
                            <input class="mb-3" id="search-query" name="keyword" type="text"
                                placeholder="Nhập &amp; Tìm kiếm..." value="{{ request()->query('keyword') }}">
                            <i class="ti-search"></i>
                            <button type="submit" class="btn btn-primary btn-block">Tìm Kiếm</button>
                        </form>
                    </div>

                    <!-- Search -->

                    <!-- categories -->
                    <div class="widget widget-categories">
                        <h4 class="widget-title"><span>Danh Mục</span></h4>
                        <ul class="list-unstyled widget-list">
                            @foreach ($categoryForMenu as $category)
                                <li>
                                    <a href="{{ route('category', ['id' => $category->id]) }}" class="d-flex">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- tags -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Thẻ</span></h4>
                        <ul class="list-inline widget-list-inline widget-card">
                            @foreach ($tags as $tag)
                                <li class="list-inline-item"><a href="tags.html">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- recent post -->
                    <div class="widget">
                        <h4 class="widget-title">Bài đăng gần đây</h4>
                        <!-- post-item -->
                        @foreach ($postTop3LatestOnHome as $post)
                            <article class="widget-card">
                                <div class="d-flex">
                                    <img class="card-img-sm" src="/client/{{ $post->img_thumnail }}">
                                    <div class="ml-3">
                                        <h5><a class="post-title"
                                                href="{{ url('post/' . $post->id) }}">
                                                {{ $post->title }}-

                                                {{ $post->id }}</a></h5>
                                        <ul class="card-meta list-inline mb-0">
                                            <li class="list-inline-item mb-0">
                                                <i class="ti-calendar"></i>{{ $post->updated_at }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Social -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Liên kết</span></h4>
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
