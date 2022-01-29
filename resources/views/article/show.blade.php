@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <h1>{{$article->title}}</h1>
                <h3>{{$article->author}}</h3>
                <h3>{{$article->category}}</h3>
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
            <div class="container my-6">
                <a href="{{ route('articlecategory.index') }}" class="btn btn-info">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection