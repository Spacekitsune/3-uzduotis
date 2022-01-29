@extends('layouts.app')

@section('content')


<div class="container">

    <h1>Article category list</h1>

    @if (session()->has('success_message'))
    <div class="alert alert-success">Category was deleted.</div>
    @endif

    @if (count($articleCategory)== 0)
    <p>There are no article categories</p>
    @endif

    <a class="btn btn-primary" href="{{route('articlecategory.create')}}">Create new category</a>

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <!-- <th>Articles</th> -->
            <th>Action</th>
        </tr>

        <!--blade sintaksė -->
        @foreach ($articleCategory as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->description}}</td>
           <!-- <td></td> -->
            <td>
                <a class="btn btn-primary" href="{{route('articlecategory.show', [$category])}}">Show</a>
                <a class="btn btn-success" href="{{route('articlecategory.edit', [$category])}}">Edit</a>

                <form action="{{route('articlecategory.destroy', [$category])}}" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</div>



@endsection