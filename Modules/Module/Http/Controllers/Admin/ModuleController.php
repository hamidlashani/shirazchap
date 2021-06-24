<?php

namespace Modules\Module\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Nwidart\Modules\Facades\Module;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $modules = Module::all();
        return view('module::admin.all',compact('modules'));
    }

    public function disable($module){

        $module = Module::find($module);
        $module->disable();
        return back();
    }
    public function enable($module){

        $module = Module::find($module);
        $module->enable();
        return back();
    }

}
