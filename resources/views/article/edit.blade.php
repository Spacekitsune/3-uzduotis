@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>Edit article</h1>

                <form action="{{ route('article.update', [$article]) }}" method="POST">

                    <input class="form-control" type="text" name="article_title" value="{{$article->title}}"></br>
                    <input class="form-control" type="text" name="article_excerpt" value="{{$article->excerpt}}"></br>
                    <textarea cols="30" rows="10" class="form-control" name="article_description">{{$article->description}}</textarea></br>
                    <input class="form-control" type="text" name="article_author" value="{{$article->author}}"> </br>
                    <select class="form-control form-select" name="article_category">
                        @foreach ($selected_values as $category)
                        @if ($category->id == $article->category)
                        <option value="{{$category->id}}" selected>{{$category->title}}</option>
                        @else
                        <option value="{{$category->id}}"> {{$category->title}} </option>
                        @endif
                        @endforeach
                    </select>
                    @csrf
                    <button class="btn btn-success" type="submit">Add article</button>

                </form>
            </div>
            <div class="container my-6">
                <a href="{{ route('article.index') }}" class="btn btn-info">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection