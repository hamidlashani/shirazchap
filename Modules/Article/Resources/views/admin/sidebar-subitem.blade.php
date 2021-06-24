@php
   $modulesdate = new \Nwidart\Modules\Json($module->getpath().'/module.json');

@endphp

<ul class="childNav" data-parent="article">

   <li class="nav-item">
      <a class="" href="{{ route('admin.articles.index') }}">
         <i class="nav-icon {{ $modulesdate->get('icon-list') }}"></i>
         <span class="item-name">لیست مقالات</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="" href="{{ route('admin.articles.create') }}">
         <i class="nav-icon {{ $modulesdate->get('icon-create') }}"></i>
         <span class="item-name">ثبت مقاله جدید</span>
      </a>
   </li>
</ul>
