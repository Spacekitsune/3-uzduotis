@extends('layouts.app')

@section('content')


<div class="container">

    <h1>Articles</h1>

    @if (session()->has('success_message'))
    <div class="alert alert-success">Article was deleted.</div>
    @endif

    @if (count($article)== 0)
    <p>There are no articles</p>
    @endif

    <a class="btn btn-primary" href="{{route('article.create')}}">Create new article</a>

    <!--blade sintaksė -->
    @foreach ($article as $article)
    <div class="container border border-5 my-2">
        <a href="{{route('article.show', [$article])}}">
            <h1>{{$article->title}}</h1>
        </a>
        <h3>{{$article->author}}</h3>
        <a href="{{route('articlecategory.show', [$article->category])}}">
            <h6>{{$article->articleCategory->title}}</h6>
        </a>

        <p>{{$article->excerpt}}</p>
        <p>
            <a class="btn btn-primary" href="{{route('article.show', [$article])}}">Show</a>
            <a class="btn btn-success" href="{{route('article.edit', [$article])}}">Edit</a>
        <form action="{{route('article.destroy', [$article])}}" method="POST">
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
        </p>

    </div>
    @endforeach


</div>



@endsection