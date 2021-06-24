@php
   $modulesdate = new \Nwidart\Modules\Json($module->getpath().'/module.json');

@endphp

<ul class="childNav" data-parent="printingoffice">
   <li class="nav-item">
      <a class="" href="{{ route('admin.printingoffice.allmedia') }}">
         <i class="nav-icon {{ $modulesdate->get('icon-list') }}"></i>
         <span class="item-name">لیست مدیا</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="" href="{{ route('admin.printingoffice.addmedia') }}">
         <i class="nav-icon {{ $modulesdate->get('icon-list') }}"></i>
         <span class="item-name">ثبت مدیا جدید</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="" href="{{ route('admin.printingoffice.allproducts') }}">
         <i class="nav-icon {{ $modulesdate->get('icon-list') }}"></i>
         <span class="item-name">لیست محصولات لارج فرمت</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="" href="{{ route('admin.printingoffice.addproduct') }}">
         <i class="nav-icon {{ $modulesdate->get('icon-create') }}"></i>
         <span class="item-name"> ثبت محصول لارج فرمت</span>
      </a>
   </li>   <li class="nav-item">
      <a class="" href="{{ route('admin.cards.index') }}">
         <i class="nav-icon {{ $modulesdate->get('icon-create') }}"></i>
         <span class="item-name">لیست کارت ویزیت</span>
      </a>
   </li>
   </li>   <li class="nav-item">
      <a class="" href="{{ route('admin.cards.create') }}">
         <i class="nav-icon {{ $modulesdate->get('icon-create') }}"></i>
         <span class="item-name">ثبت کارت ویزیت</span>
      </a>
   </li>
   </li>   <li class="nav-item">
      <a class="" href="{{ route('admin.banners.index') }}">
         <i class="nav-icon {{ $modulesdate->get('icon-create') }}"></i>
         <span class="item-name">لیست بنر های مناسبتی</span>
      </a>
   </li>
   </li>   <li class="nav-item">
      <a class="" href="{{ route('admin.banners.create') }}">
         <i class="nav-icon {{ $modulesdate->get('icon-create') }}"></i>
         <span class="item-name">ثبت بنر مناسبتی</span>
      </a>
   </li>
</ul>
