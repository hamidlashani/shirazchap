<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Articles::query();
        $articles = $article->latest()->paginate(env('PAGINATE_COUNTER'));

        $category = Category::all();

        return view('admin.articels.all',compact('articles','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title'=>['required','min:10','max:20'],
            //'slug'=>'',
            'intro'=>'required',
            'text'=>'required',
            'introimage'=>'required',
            'textimage'=>'required',
            'category_id'=>'required',
            'state'=>'required',
        ]);
        $validate['user_id'] = Auth::user()->id;

       Articles::create($validate);
        alert()->success('مقاله با موفقیت ثبت شد', 'پیام سیستم');

        return redirect(route('admin.articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $article)
    {
        return view('admin.articels.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $article)
    {
        $validate = $request->validate([
            'title'=>'required',
            //'slug'=>'',
            'intro'=>'required',
            'text'=>'required',
            'introimage'=>'required',
            'textimage'=>'required',
            'category_id'=>'required',
            'state'=>'required',
        ]);

        $validate['slug'] = null;

        $article->update($validate);

        alert()->success('مقاله با موفقیت بروزرسانی شد', 'پیام سیستم');
        return redirect(route('admin.articles.index'));





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $article)
    {
        $article->delete();
        return back();
    }
}
