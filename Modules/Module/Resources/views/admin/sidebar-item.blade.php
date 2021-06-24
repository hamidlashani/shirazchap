@php
   $modulesdate = new \Nwidart\Modules\Json($module->getpath().'/module.json');

@endphp



<li class="nav-item">
   <a class="nav-item-hold" href="{{ route('admin.modules.index') }}">
      <i class="nav-icon {{ $modulesdate->get('icon-base') }}"></i>
      <span class="nav-text">مدیریت ماژول ها</span>
   </a>
   <div class="triangle"></div>
</li>
