<?php

namespace Modules\Article\Http\Controllers\Admin;

use App\Models\state;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Article\Entities\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $article = Article::query();
        $articles = $article->latest()->paginate(env('PAGINATE_COUNTER'));


        return view('article::admin.all',compact('articles'));    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $article = Article::first();
        $states = state::all();
        $cats =  DB::table('categories')->where('type',get_class($article))->get();
        return view('article::admin.create',compact('states','cats'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title'=>['required'],
            //'slug'=>'',
            'intro'=>'required',
            'text'=>'required',
            'introimage'=>'required',
            'textimage'=>'required',
            'category_id'=>'required',
            'state'=>'required',
        ]);
        $validate['user_id'] = Auth::user()->id;
       // $validate['user_id'] = 3;

        $article = Article::create($validate);
        $article->categories()->sync($request->get('category_id'));

        alert()->success('مقاله با موفقیت ثبت شد', 'پیام سیستم');

        return redirect(route('admin.articles.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('article::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Article $article)
    {
        $states = state::all();
        $cats =  DB::table('categories')->where('type',get_class($article))->get();

        return view('article::admin.edit',compact('article','states','cats'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Article $article)
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
        $article->categories()->sync($request->get('category_id'));

        alert()->success('مقاله با موفقیت بروزرسانی شد', 'پیام سیستم');
        return redirect(route('admin.articles.index'));

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return back();
    }
}
