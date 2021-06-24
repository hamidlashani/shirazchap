@extends('admin.Gull-master')


@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>ای دی مدیا</th>
                        <th>نام مدیا</th>
                        <th>وضعیت</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($medias as $media)
                        <tr>
                            <td>{{ $media->id }}</td>
                            <td>{{ $media->title }}</td>
                            <td>
                                @if($media->state == '1')
                                    <span class="btn btn-success">فعال</span>
                                    @else
                                <span class="btn btn-danger">غیر فعال</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <button type="button" class="btn btn-success ">
                                    <a href="{{ route('admin.printingoffice.mediaedite',['media'=>$media->id]) }}"><i class="nav-icon i-Pen-2 "></i></a>
                                </button>
                                    <form method="post" action="{{ route('admin.printingoffice.mediadestroy',['media'=>$media->id]) }}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ml-2">حذف</button>

                                    </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <?php echo $medias->render(); ?>        </div>
    </div>
@endsection