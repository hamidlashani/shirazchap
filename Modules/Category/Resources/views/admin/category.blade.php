<?php $c = 0 ; ?>
@foreach($categories as $cat)

    <tr>
        <td>{{ $cat->id }}</td>
        <td @if($cat->parent_id != 0) style="padding-right: 25px"  @endif>@if($cat->parent_id != 0) --  @endif        {{ $cat->title }}</td>
        <td><a href="{{ route('admin.category.edit',['category'=>$cat->id]) }}" class="btn btn-info btn-sm ml-1">ویرایش</a>
        </td>
    </tr>
    @include('category::admin.category',['categories'=>\Modules\Category\Entities\Category::where('parent_id',$cat->id)->get()])
@endforeach


