@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>Upload new image</h1>

                <form action="{{ route('articleimage.update', [$articleImage]) }}" method="POST" enctype="multipart/form-data">

                    <input class="form-control" type="file" name="articleImage_src" >
                    <input class="form-control" type="text" name="articleImage_alt" value="{{$articleImage->alt}}"></br>
                    <input class="form-control" type="number" name="articleImage_height" value="{{$articleImage->height}}"></br>
                    <input class="form-control" type="number" name="articleImage_width" value="{{$articleImage->width}}"></br>
                    <input class="form-control" type="text" name="articleImage_class" value="{{$articleImage->class}}"></br>
                    <select name="articleImage_articleId" class="form-control form-select">
                        @foreach ($selected_values as $article)
                        @if ($article->id == $articleImage->article_id)
                        <option value="{{$article->id}}" selected>{{$article->title}}</option>
                        @else
                        <option value="{{$article->id}}"> {{$article->title}} </option>
                        @endif
                        @endforeach

                        @csrf
                        <button class="btn btn-success" type="submit">Update image</button>

                </form>
            </div>
            <div class="container my-6">
                <a href="{{ route('articleimage.index') }}" class="btn btn-info">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection