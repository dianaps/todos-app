@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-5 align-items-center">
            <div class="container border p-4 mt-4">
                <form action="{{ route('todos') }}" method="POST">
                    @csrf

                    @if (session('success'))
                        <h6 class="alert alert-success">{{session('success')}}</h6>
                    @endif

                    @error('title')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                    @enderror

                    <div class="mb-3">
                        <h3>Create New Todo</h3>
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" class="form-select" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div class="d-grid gap-2 mt-3 mb-3">
                        <button type="submit" class="btn btn-primary">Add New Todo</button>
                    </div>
                </form> 
            </div>
        </div>
        <div class="col-7 align-items-center">
            <div class="container border p-4 mt-4">
            <div class="container text-center">
                <h3 class="display-6">TodosList</h3>
            </div>
            @foreach ($todos as $todo)
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{ route('todos-edit', ['id' => $todo->id]) }}">
                        <span class="color-container" style="background-color:{{$todo->category->color}}"></span> {{$todo->title}}
                    </a>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{route('todos-destroy', [$todo->id])}}" method="POST">
                        {{-- @method('DELETE') --}}
                        @csrf
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection