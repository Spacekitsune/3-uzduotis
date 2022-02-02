<?php

namespace App\Http\Controllers;

use App\Models\ArticleImage;
use App\Models\Article;
use App\Http\Requests\StoreArticleImageRequest;
use App\Http\Requests\UpdateArticleImageRequest;
use Illuminate\Http\Request;

class ArticleImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleImage = ArticleImage::all();
        return view('articleimage.index', ['articleImage' => $articleImage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selected_values = Article::all();
        return view('articleimage.create', ['selected_values' => $selected_values]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articleImage = new ArticleImage;

        $imageName = 'image' . time().'.'.$request->articleImage_src->extension();

        $request->articleImage_src->move(public_path('images') , $imageName);

        $articleImage->alt = $request->articleImage_alt;
        $articleImage->src = $imageName;    
        $articleImage->height = $request->articleImage_height;
        $articleImage->width = $request->articleImage_width;
        $articleImage->class = $request->articleImage_class;
        $articleImage->article_id = $request->articleImage_articleId;

        $articleImage->save();

        return redirect()->route('articleimage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleImage $articleImage)
    {
        return view('articleimage.show', ['articleImage' => $articleImage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleImage $articleImage)
    {
        $selected_values = Article::all();
        return view('articleimage.edit', ['articleImage' => $articleImage], ['selected_values' => $selected_values]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleImageRequest  $request
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleImage $articleImage)
    {
        if($request->has('articleImage_src')) {
            $imageName = 'image' . time().'.'.$request->articleImage_src->extension();
            $request->articleImage_src->move(public_path('images') , $imageName);
            $articleImage->src = $imageName;
        }
        
        $articleImage->alt = $request->articleImage_alt;
        $articleImage->height = $request->articleImage_height;
        $articleImage->width = $request->articleImage_width;
        $articleImage->class = $request->articleImage_class;
        $articleImage->article_id = $request->articleImage_articleId;

        $articleImage->save();

        return redirect()->route('articleimage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleImage $articleImage)
    {
        // $attendancegroups = $school->schoolAttendancegroups;
        // if (count($attendancegroups) != 0) {
        //     return redirect()->route('school.index')->with('error_message', 'Delete is not possible while school has attendance groups.');
        // } 
        $dir = "images";
        unlink($dir.'/'.$articleImage->src);
        $articleImage->delete();
        return redirect()->route('articleimage.index')->with('success_message', 'Image was deleted.');
    }
}
