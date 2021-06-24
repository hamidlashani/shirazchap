@extends('admin.Gull-master')


@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>عنوان ماژول</th>
                        <th>تصویر ماژول</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($modules as $module)
                        @php
                            $modulesdate = new \Nwidart\Modules\Json($module->getpath().'\module.json');

                        @endphp
                    <tr>
                        <td>{{ $modulesdate->get('alias') }}</td>
                        <td><img src="{{ asset($modulesdate->get('image')) }}"></td>
                        <td>

                            @if(isActiveModule($module->getName()))
                                <a class="btn btn-danger" href="#" onclick="event.preventDefault();document.getElementById('{{ $module->getName() }}-disable').submit()">غیر فعال سازی</a>
                                <form
                                        id="{{ $module->getName() }}-disable"
                                        action="{{ route('admin.modules.disable',['module'=>$module->getName()]) }}"
                                        method="post"
                                >
                                    @csrf
                                    @method('PATCH')
                                </form>

                            @else
                                <a class="btn btn-success" href="#" onclick="event.preventDefault();document.getElementById('{{ $module->getName() }}-enable').submit()"> فعال سازی</a>
                                <form
                                        id="{{ $module->getName() }}-enable"
                                        action="{{ route('admin.modules.enable',['module'=>$module->getName()]) }}"
                                        method="post"
                                        >
                                    @csrf
                                    @method('PATCH')
                                </form>

                            @endif

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection