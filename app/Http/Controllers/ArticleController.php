<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $article = Article::all();
        return view('article.index', ['article' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selected_values = ArticleCategory::all();
        return view('article.create', ['selected_values' => $selected_values]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->article_title;
        $article->excerpt = $request->article_excerpt;
        $article->description = $request->article_description;
        $article->author = $request->article_author;
        $article->category = $request->article_category;


        $article->save();

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $selected_values = ArticleCategory::all();
        return view('article.edit', ['article' => $article], ['selected_values' => $selected_values]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->title = $request->article_title;
        $article->excerpt = $request->article_excerpt;
        $article->description = $request->article_description;
        $article->author = $request->article_author;
        $article->category = $request->article_category;


        $article->save();

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // $attendancegroups = $school->schoolAttendancegroups;
        // if (count($attendancegroups) != 0) {
        //     return redirect()->route('school.index')->with('error_message', 'Delete is not possible while school has attendance groups.');
        // } 
            $article->delete();
            return redirect()->route('article.index')->with('success_message', 'Article was deleted.');
    }
    
}
