@php
   $modulesdate = new \Nwidart\Modules\Json($module->getpath().'/module.json');

@endphp


<li class="nav-item " data-item="article">
   <a class="nav-item-hold" href="#">
             <i class="nav-icon {{ $modulesdate->get('icon-base') }}"></i>
      <span class="nav-text">مدیریت مقالات</span>
   </a>
   <div class="triangle"></div>
</li>