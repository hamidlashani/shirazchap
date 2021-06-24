<?php

namespace Modules\Banners\Http\Controllers\Admin;

use App\Models\state;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Banners\Entities\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $banners = Banner::query();
        $banners = $banners->latest()->paginate(env('PAGINATE_COUNTER'));

        return view('banners::admin.all',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $banner = Banner::first();
        $images_category = DB::table('categories')->where('type','Modules\Images\Entities\images')->get();
        $states = state::all();
        $cats =  DB::table('categories')->where('type',get_class($banner))->get();
        return view('banners::admin.create',compact(['cats','states','images_category']));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'=>['required'],
            'category'=>'required',
            'delivery'=>'required',
            'image'=>'required',
            'description'=>'required',
            'state'=>'required',
            'imagespath'=>'required',
        ]);
        $imagespath = ($validate['imagespath']);
        if((is_dir($imagespath)) != true){
            mkdir(public_path($imagespath),0777,true);
        }


        $validate['slug'] = null;
if($request->get('options') ) {
    foreach ($request->get('options') as $option) {
        if ($option != null) {
            $options[] = $option;
        }
    }
    $options = json_encode($options, JSON_UNESCAPED_UNICODE);
    $validate['options'] = $options;

}

        $sizes = $request->prices['size'];

        foreach ($sizes as $key=>$value){
            if($value != null){
                $sizeed[] = [
                    'size'=>$value,
                    'price'=>$request->prices['price'][$key]
                ];
            }
        }

        $sizes = json_encode($sizeed,JSON_UNESCAPED_UNICODE );



        $validate['prices'] = $sizes;





        $Banner =  Banner::create($validate);
        $Banner->categories()->sync($request->get('category'));

        alert()->success('محصول با موفقیت ثبت شد', 'پیام سیستم');
        return redirect(route('admin.banners.index'));    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('banners::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Banner $banner)
    {

        $states = state::all();
        $cats =  DB::table('categories')->where('type',get_class($banner))->get();

        $images_category = DB::table('categories')->where('type','Modules\Images\Entities\images')->get();

        return view('banners::admin.edit',compact(['banner','cats','states','images_category']));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name'=>['required'],
            'category'=>'required',
            'delivery'=>'required',
            'image'=>'required',
            'description'=>'required',
            'state'=>'required',
            'imagespath'=>'required',
        ]);

        $imagespath = ($validate['imagespath']);
        if((is_dir($imagespath)) != true){
            mkdir(public_path($imagespath),0777,true);
        }


        $validate['slug'] = null;

        if($request->get('options')[0] != null ) {
            foreach ($request->get('options') as $option) {
                if ($option != null) {
                    $options[] = $option;
                }
            }
            $options = json_encode($options, JSON_UNESCAPED_UNICODE);
            $validate['options'] = $options;

        }

        $sizes = $request->prices['size'];

        foreach ($sizes as $key=>$value){
            if($value != null){
                $sizeed[] = [
                    'size'=>$value,
                    'price'=>$request->prices['price'][$key]
               ];
            }
        }

        $sizes = json_encode($sizeed,JSON_UNESCAPED_UNICODE );



        $validate['prices'] = $sizes;





        $Banner = Banner::find($id);
        $Banner->update($validate);

        $Banner->categories()->sync($request->get('category'));

        alert()->success('محصول با موفقیت بروزرسانی شد', 'پیام سیستم');
        return redirect(route('admin.banners.index'));

}
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->categories()->detach();
        $banner->delete();

        return back();

    }

    public function uploads(Request $request){

        $input=$request->all();

        $images=array();
        if($files=$request->file('images')){

            foreach($files as $file){
                $name=$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
                $file->move($request->path,$name);

                $images[]=$name;
                $infile = public_path($request->path,$name);
                $outFile = public_path($request->path.'/thumb');

                $image = new \Imagick($infile);
                $image->thumbnailImage( 250, 200 );
                $image->writeImage( $outFile.'/'.$name );
            }
        }
        return json_encode('ok');

    }
}
