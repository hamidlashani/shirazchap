@php
   $modulesdate = new \Nwidart\Modules\Json($module->getpath().'/module.json');

@endphp

<ul class="childNav" data-parent="user">
   <li class="nav-item">
      <a class="" href="{{ route('admin.users.index') }}">
         <i class="nav-icon {{ $modulesdate->get('icon-list') }}"></i>
         <span class="item-name">لیست کاربران</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="" href="{{ route('admin.users.create') }}">
         <i class="nav-icon {{ $modulesdate->get('icon-create') }}"></i>
         <span class="item-name">ثبت کاربر جدید</span>
      </a>
   </li>
</ul>
