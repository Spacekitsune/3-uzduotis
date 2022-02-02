@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>Upload new image</h1>

                <form action="{{ route('articleimage.store') }}" method="POST" enctype="multipart/form-data">
                
                    <input class="form-control" type="file" name="articleImage_src"  required autofocus>
                    <input class="form-control" type="text" name="articleImage_alt" placeholder="alt"></br>
                    <input class="form-control" type="number" name="articleImage_height" placeholder="height px"></br>
                    <input class="form-control" type="number" name="articleImage_width" placeholder="width px"></br>
                    <input class="form-control" type="text" name="articleImage_class" placeholder="class"></br>
                    <select name="articleImage_articleId" class="form-control form-select">
                        @foreach ($selected_values as $articles)

                        <option value="{{$articles->id}}"> {{$articles->title}} </option>

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