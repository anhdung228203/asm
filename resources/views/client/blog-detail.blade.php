@extends('client.layouts.master')

@section('content')
    <div class="py-4"></div>
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-lg-9   mb-5 mb-lg-0">
                    <article>
                        <div class="post-slider mb-4">
                            <img src="{{ asset('/theme/client/' . $post->img_thumnail) }}" class="card-img" alt="post-thumb">
                        </div>

                        <h1 class="h2">{{ $post->title }}</h1>
                        <ul class="card-meta my-3 list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="/client/{{ $post->author->avatar }}">
                                    <span>{{ $post->author->name }}</span>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>{{ $post->updated_at }}
                            </li>

                        </ul>
                        <div class="content">

                            {{ strtolower(strip_tags($post->content)) }}

                        </div>
                    </article>

                </div>

            </div>
        </div>
    </section>
@endsection
