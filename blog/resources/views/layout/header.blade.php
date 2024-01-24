<header class="header">
    <div class="container bg-light d-flex justify-content-between align-items-center">
        <div class="d-flex">
            <a class="logo" href="{{ route('index') }}">InternToYou</a>
            <form method="get" action="{{ route('index') }}" class="form-inline my-2 my-lg-0 ml-3">
                <input value="{{ request()->query('keyword') }}" name="keyword" class="form-control form-control-sm" type="search" placeholder="Search" aria-label="Search">
                <select name="category_id" class="form-control form-control-sm ml-2" id="exampleFormControlSelect1">
                    <option value="0">Select category</option>
                    \\annotation
                    @foreach(categories() as $id => $name)
                        <option {{ request()->query('category_id') == $id ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                <button class="btn btn-sm btn-outline-success ml-2 px-4" type="submit">Search</button>
            </form>
        </div>
        <div class="right-btn">
            @auth
                <a href="{{ route('user.info') }}" class="text-dark mr-3 text-decoration-none">
                    <img width="30" height="30" src="{{ avatar(auth()->user()->avatar) }}" class="rounded-pill" alt="...">
                    {{--                    <span>{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>--}}
                    <span>{{ auth()->user()->name }}</span>
                </a>
                <a href="{{ route('blog.create') }}" class="text-dark mr-3 text-decoration-none">Publish an article</a>
                <form method="post" action="{{ route('logout') }}" class="d-inline" id="logout">
                    @csrf
                    <a href="javascript:;" onclick="document.getElementById('logout').submit()" class="text-dark text-decoration-none">Exit</a>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-sm btn-outline-success ml-2">Register</a>
            @endauth
        </div>
    </div>
</header>
