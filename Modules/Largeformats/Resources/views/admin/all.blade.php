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
                    @foreach($largeformats as $Largeformat)

                        <tr>
                            <td>{{ $Largeformat->id }}</td>
                            <td>{{ $Largeformat->title }}</td>
                            <td>{{ $Largeformat->slug }}</td>
                            <td><?php foreach(\Modules\Largeformats\Entities\Largeformat::find($Largeformat->id)->categories as $a){
                                echo $a->title;
                            } ?></td>
                            <td><img style="width: 90px;" src="{{ $Largeformat->image }}" alt="{{ $Largeformat->slug }}"></td>
                            <td class="d-flex">
                                <a href="{{ route('admin.largeformats.edit',['largeformat'=>$Largeformat->id]) }}" class="btn btn-info btn-sm ml-1">ویرایش</a>
                                <form method="post" action="{{ route('admin.largeformats.destroy',['largeformat'=>$Largeformat->id]) }}" >
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