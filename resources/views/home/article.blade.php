@extends('layouts.app')

@section('content')
    <div id="wrap_all">
        <div class="dashboard chap_container">


            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">خانه</a></li>
                    <li class="breadcrumb-item"><a href="/مقالات">مقالات</a></li>
                    <li class="breadcrumb-item active">{{ $articles->title }}</li>
                </ol>
                </nav>

            <div id="chap_content">

                <section class="news-item no-padding no-margin no-border">
                    <div class="chap_col-12">
                        @if($articles->textimage)
                        <img class="img-bordered mb-3" style="width: 100%" src="{{ $articles->textimage }}" >
                        @endif
                        <div class="news-item-header">
                            <h1>{{ $articles->title }}</h1>
                            <span class="news-item-date">{{ jdate($articles->created_at)->format('%A, %d %B %Y') }}</span>
                        </div>
                        <div class="news-item-content content-from-text-editor">
                            @php echo $articles->text @endphp
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="block - init block - border - color">
        <div class="row row - 70"></div>
    </div>
@endsection