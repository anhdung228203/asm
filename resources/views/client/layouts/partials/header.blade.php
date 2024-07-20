@php
    $categoryForMenu = DB::table('categories')->select('id', 'name')->get();
@endphp

<nav class="navbar navbar-expand-lg navbar-white">
    <a class="navbar-brand order-1" href="{{ url('/') }}">
        <img class="img-fluid" width="100px" src="/client/images/logo.png" alt="Reader | Hugo Personal Blog Template">
    </a>
    <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{ url('/') }}">
                    Trang chủ
                </a>

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button">
                    Giới Thiệu
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="contact.html">Liên Hệ</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Danh Mục <i class="ti-angle-down ml-1"></i>
                </a>
                <div class="dropdown-menu">
                    @foreach ($categoryForMenu as $category)
                        <a class="dropdown-item"
                            href="{{ route('category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </li>


        </ul>
    </div>

    <div class="order-2 order-lg-3 d-flex align-items-center">


        <!-- search -->
        <form class="search-bar" method="POST" action="{{ url('/search') }}">
            {{ csrf_field() }}
            <input id="search-query" name="keyword" type="text" placeholder="Nhập &amp; Tìm kiếm..."
                value="{{ request()->query('keyword') }}">
            <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse"
                data-target="#navigation">
                <i class="ti-menu"></i>
            </button>
        </form>


    </div>

</nav>
