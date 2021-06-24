@extends('layouts.app')

@section('content')
    <div id="wrap_all">
        <div class="dashboard chap_container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item active" aria-current="page">مقالات</li>
            </ol>
        </nav>
        <div class=" blog-page">
                @foreach($articles as $article)
                    <article class="col-sm-12 col-md-12 col-lg-12 mb-2">
                        <div class="card card--z- row" style="flex-direction: initial !important;   ">
                            <div class="col-md-4 no-padding">
                                <img class="card-img-top" src="{{ $article->introimage }}">
                            </div>
                            <div class="card-block col-md-8" style="padding: 10px; text-align: right">
                                <h4 class="card-title mt-3">{{ $article->title }}</h4>
                                <div class="card-text" >
                                    {{ $article->intro }}
                                </div>
                            </div>
                            <div class="card-footer">
                                <small style="float: left">{{ Jdate($article->created_at)->format('%A , %d %B %Y') }}</small>
                                <button class="btn btn-secondary float-right btn-sm">
                                    <a style="color: #ffffff" href="/مقالات/{{ $article->slug }}">بیشتر بخوانید</a>
                                </button>
                            </div>
                        </div>
                    </article>

                @endforeach
            {!! $articles->render() !!}
        </div>
    </div>
    </div>
    <style>
        .card-footer {
            padding: .75rem 1.25rem;
            background-color: rgba(0,0,0,.03);
            border-top: 1px solid rgba(0,0,0,.125);
            width: 100%;
        }
    </style>
@endsection
