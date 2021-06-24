@extends('admin.Gull-master')

@section('title')
    لیست کاربران
@endsection
@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            <div class="table-responsive">
                <table class="table table-dark">
                    <caption>List of users</caption>
                    <thead>
                    <tr>
                        <th>آی دی کاربر</th>
                        <th>نام کاربر</th>
                        <th>آواتار</th>
                        <th>تلفن همراه</th>
                        <th>ایمیل</th>
                        <th>نام شرکت</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @php
                                $GetTheHash = md5(strtolower(trim($user->email)));
                                $avatar = 'http://www.gravatar.com/avatar/' . $GetTheHash . '?s=100';

                            @endphp
                            <img class="rounded-circle m-0 avatar-sm-table " src="{{ $avatar }}" alt="">

                        </td>

                        <td>{{ $user->cellphone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->company }}</td>
                        <td>
                            <button type="button" class="btn btn-success ">
                                <a href="{{ route('admin.users.edit',['user'=>$user->id]) }}"><i class="nav-icon i-Pen-2 "></i></a>
                            </button>
                            <button type="button" class="btn btn-danger ">
                                <form method="post" action="{{ route('admin.users.destroy',['user'=>$user->id]) }}" >
                                    @csrf
                                    @method('DELETE')
                                    <i class="nav-icon i-Close-Window "></i>

                                </form>

                            </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection