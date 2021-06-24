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
                    @foreach($images as $image)

                        <tr>
                            <td>{{ $image->id }}</td>
                            <td>{{ $image->name }}</td>
                            <td>{{ $image->slug }}</td>
                            <td><?php foreach(\Modules\Images\Entities\Images::find($image->id)->categories as $a){
                                echo $a->title;
                            } ?></td>
                            <td><img style="width: 100px;height: 50px" src="{{ $image->path }}" alt="{{ $image->slug }}"></td>
                            <td class="d-flex">
                                <a href="{{ route('admin.images.edit',['image'=>$image->id]) }}" class="btn btn-info btn-sm ml-1">ویرایش</a>
                                <form method="post" action="{{ route('admin.images.destroy',['image'=>$image->id]) }}" >
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