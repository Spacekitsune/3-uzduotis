@extends('layouts.app')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 g-3">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{'/images/'.$articleImage->src}}" class="bd-placeholder-img card-img-top" alt="{{$articleImage->alt}}" width="{{$articleImage->height}}" height="{{$articleImage->height}}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{route('articleimage.show', [$articleImage])}}">Show</a>
                                <a class="btn btn-success" href="{{route('articleimage.edit', [$articleImage])}}">Edit</a>
                                <form action="{{route('articleimage.destroy', [$articleImage])}}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection