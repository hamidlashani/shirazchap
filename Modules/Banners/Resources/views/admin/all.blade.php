@extends('admin.Gull-master')


@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>کد</th>
                        <th>عنوان</th>
                        <th>متن جایگزین</th>
                        <th>دسته بندی</th>
                        <th>تصویر</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banners as $banner)

                        <tr>
                            <td>{{ $banner->id }}</td>
                            <td>{{ $banner->name }}</td>
                            <td>{{ $banner->slug }}</td>
                            <td><?php foreach(\Modules\Banners\Entities\Banner::find($banner->id)->categories as $a){
                                echo $a->title;
                            } ?></td>
                            <td><img src="{{ $banner->image }}" alt="{{ $banner->slug }}"></td>
                            <td class="d-flex">
                                <a href="{{ route('admin.banners.edit',['banner'=>$banner->id]) }}" class="btn btn-info btn-sm ml-1">ویرایش</a>
                                <form method="post" action="{{ route('admin.banners.destroy',['banner'=>$banner->id]) }}" >
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