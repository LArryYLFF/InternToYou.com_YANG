@extends('layout.app')

@section('title', '首页')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>

    </style>
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid px-0">
        <div class="container text-center text-white">
            <h4 class="display-6">InternToYou.com</h4>
            <p class="lead">Offer you an internship</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-body">
                        @foreach($blogs as $blog)
                            <div class="article-body">
                                <div>
                                    <span class="article-author">{{ $blog->user->name }}</span>
                                    <span class="article-time">{{ $blog->updated_at->diffForHumans() }}</span>
                                </div>
                                <h2 class="font-weight-bold my-3 article-title">
                                    <a class="text-dark" href="{{ route('blog.show', $blog) }}">{{ $blog->title }}</a>
                                </h2>
                                <div class="article-des">{{ $blog->content }}</div>
                                <div>
                                    <a href="#" class="badge badge-warning mt-3 article-category">{{ categories()[$blog->category_id] }}</a>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        {{ $blogs->withQueryString()->links() }}
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-0">
                @include('common.right-card', [
                    'imgUrl' => 'https://img95.699pic.com/video_cover/62/38/92/a_7kNx8zmQTFvh1571623892.jpg!/fw/820',
                    'title' => 'InternToYou.com',
                    'content' => 'Provide internship opportunities for undergraduates.',
                    'count' => $blogs->total(),
                ])
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
