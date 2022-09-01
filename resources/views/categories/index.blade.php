@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-5 align-items-center">
            <div class="container border p-4 mt-4">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    @if (session('success'))
                        <h6 class="alert alert-success">{{session('success')}}</h6>
                    @endif

                    @error('name')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                    @enderror
                    <div class="mb-3">
                        <h3>Create New Category</h3>
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                        <label for="color" class="form-label">Color</label>
                        <input type="color" class="form-control form-control-color" name="color" id="color">
                    </div>
                    <button type="submit" class="btn btn-primary bg-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300">Add New Category</button>
                </form>    
            </div>
        </div>
        <div class="col-7 align-items-center">
            <div class="container border p-4 mt-4">
                <div class="container text-center">
                    <h3 class="display-6">Category List</h3>
                </div>
                @foreach ($categories as $category)
                    <div class="row py-1">
                        <div class="col-md-9 d-flex align-items-center">
                            <a href="{{ route('categories.show', ['category' => $category->id]) }}">
                                <span class="color-container" style="background-color:{{$category->color}}"></span> {{$category->name}}
                            </a>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$category->id}}">
                                Delete
                            </button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{$category->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Are you sure you want do delete this category?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    If you delete this category all the todos related will also be deleted.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{route('categories.destroy', ['category'=>$category->id])}}" method="POST">
                                        {{-- @method('DELETE') --}}
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
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