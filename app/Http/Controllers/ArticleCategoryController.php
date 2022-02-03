<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use App\Http\Requests\StoreArticleCategoryRequest;
use App\Http\Requests\UpdateArticleCategoryRequest;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortCollumn = $request->sortCollumn;
        $sortOrder = $request->sortOrder;
        //SORT_REGULAR rušiavimo algoritmas
        //true - DESC
        //false - ASC
        //tinka iki 100 db eilučių
        // $articleCategory = ArticleCategory::all()->sortBy('id', SORT_REGULAR, true);
        //tinka virš 100 db eilučių
        if (empty($sortCollumn) || empty($sortOrder)) {
            $articleCategory = ArticleCategory::all();
        } else {
            $articleCategory = ArticleCategory::orderBy($sortCollumn, $sortOrder)->get();
        }
        return view('articlecategory.index', ['articleCategory' => $articleCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articlecategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articleCategory = new ArticleCategory();
        $articleCategory->title = $request->articlecategory_title;
        $articleCategory->description = $request->articlecategory_description;

        $articleCategory->save();

        return redirect()->route('articlecategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCategory $articleCategory)
    {
        return view('articlecategory.show', ['articleCategory' => $articleCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCategory $articleCategory)
    {
        return view('articlecategory.edit', ['articleCategory' => $articleCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleCategoryRequest  $request
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCategory $articleCategory)
    {

        $articleCategory->title = $request->articlecategory_title;
        $articleCategory->description = $request->articlecategory_description;

        $articleCategory->save();

        return redirect()->route('articlecategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleCategory $articleCategory)
    {
        // $attendancegroups = $school->schoolAttendancegroups;
        // if (count($attendancegroups) != 0) {
        //     return redirect()->route('school.index')->with('error_message', 'Delete is not possible while school has attendance groups.');
        // } 
        $articleCategory->delete();
        return redirect()->route('articlecategory.index')->with('success_message', 'Category was deleted.');
    }
}
