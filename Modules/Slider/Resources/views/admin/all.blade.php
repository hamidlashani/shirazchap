@extends('admin.Gull-master')


@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>کد اسلایدر</th>
                        <th>تصویر اسلایدر</th>
                        <th>متن جایگزین</th>
                        <th>لینک ارجاع</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slider)

                        <tr>
                            <td>{{ $slider->id }}</td>
                            <td><img width="50" src="{{ $slider->image }}"></td>
                            <td>{{ $slider->alt }}</td>
                            <td>{{ $slider->url }}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.sliders.edit',['slider'=>$slider->id]) }}" class="btn btn-info btn-sm ml-1">ویرایش</a>
                                <form method="post" action="{{ route('admin.sliders.destroy',['slider'=>$slider->id]) }}" >
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