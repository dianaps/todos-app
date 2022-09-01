@extends('app')

@section('content')
<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
        @method('PATCH')
        @csrf

        @if (session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif

        @error('name')
            <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror

        <div class="mb-3">
            <h3>Update Category</h3>
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
            <label for="color" class="form-label">Color</label>
            <input type="color" class="form-control" name="color" id="color" value="{{$category->color}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form> 
    <div class="container border p-4 mt-4">
        <div class="container text-center">
            <h4>{{$category->name}} Todo List</h4>
        </div>
        @if ($category->todos->count()>0)
            @foreach ($category->todos as $todo)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('todos-edit', ['id' => $todo->id]) }}">
                            {{$todo->title}}
                        </a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{route('todos-destroy', [$todo->id])}}" method="POST">
                            {{-- @method('DELETE') --}}
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            No todos found
        @endif    
    </div>    
</div>
@endsection