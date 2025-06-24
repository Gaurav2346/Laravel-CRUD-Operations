@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @session('status')
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endsession
            <div class="card">
            <div class="card-header">
                <h4>Categories lists
                    <a href="{{ url('category/create') }}" class="btn btn-primary float-end">Add category</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->status == 1 ? 'visible' : 'hidden' }}</td>
                            <td>
                                <a href="{{ route('category.edit' , $category->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('category.show' , $category->id) }}" class="btn btn-info">Show</a>
                                <form action="{{ route('category.destroy',$category->id) }}" method="POST" class="d-inline"
                                    onsubmit = "return confirm('Are you sure to confirm ?')">
                                    @csrf   
                                    @method('Delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
            </div>
        </div>
    </div>
</div>


@endsection