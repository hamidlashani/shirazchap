@extends('admin.Gull-master')


@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>کد مقاله</th>
                        <th>عنوان مقاله</th>
                        <th>نام مستعار مقاله</th>
                        <th>دسته بندی</th>
                        <th>تصویر اصلی</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        @php
                            $category = DB::table('categories')->where('id', $article->category_id )->first();

                        @endphp
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->slug }}</td>
                            <td></td>
                            <td><img width="50" src="{{ $article->introimage }}"></td>
                            <td class="d-flex">
                                <a href="{{ route('admin.articles.edit',['article'=>$article->id]) }}" class="btn btn-info btn-sm ml-1">ویرایش</a>
                                <form method="post" action="{{ route('admin.articles.destroy',['article'=>$article->id]) }}" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">حذف</button>

                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection