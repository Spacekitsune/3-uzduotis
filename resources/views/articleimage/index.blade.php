@extends('layouts.app')

@section('content')


<div class="container">

    <h1>Image list</h1>

    @if (session()->has('success_message'))
    <div class="alert alert-success">Image was deleted.</div>
    @endif

    @if (count($articleImage)== 0)
    <p>There are no images</p>
    @endif

    <a class="btn btn-primary" href="{{route('articleimage.create')}}">Upload new image</a>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 g-3">
            @foreach ($articleImage as $image)
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{'/images/'.$image->src}}" class="bd-placeholder-img card-img-top" alt="{{$image->alt}}" width="100%" height="225">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{route('articleimage.show', [$image])}}">Show</a>
                                <a class="btn btn-success" href="{{route('articleimage.edit', [$image])}}">Edit</a>

                                <form action="{{route('articleimage.destroy', [$image])}}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>

</div>



@endsection