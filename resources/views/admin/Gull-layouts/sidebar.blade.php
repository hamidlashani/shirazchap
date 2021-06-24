    <div class="side-content-wrap">
        <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
            <ul class="navigation-left">

@foreach(\Nwidart\Modules\Facades\Module::collections() as $module)

@if(\Illuminate\Support\Facades\View::exists("{$module->getLowerName()}::admin.sidebar-item"))

@include("{$module->getLowerName()}::admin.sidebar-item")
    @endif
@endforeach


            </ul>
        </div>

        <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">



        @foreach(\Nwidart\Modules\Facades\Module::collections() as $module)

        @if(\Illuminate\Support\Facades\View::exists("{$module->getLowerName()}::admin.sidebar-subitem"))

        @include("{$module->getLowerName()}::admin.sidebar-subitem")
            @endif
        @endforeach


        </div>
        <div class="sidebar-overlay"></div>
    </div>
