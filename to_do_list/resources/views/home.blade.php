@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card h-100">
        <div class="card-header">
            <h3>To Do List</h3>
        </div>
        <div class="card-body">
            <div class="row p-2">
                <form action="{{ route('tasks.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" >
                    <label for="">Add task</label>
                    <input type="text" class="form-control" name="task">

                    <div class="form-group">
                        <label for="">image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary mt-2 w-25" style="" type="submit">Add</button>
                    </div>
                </div>
                </form>

            </div>
            <div class="row py-5">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>task</th>
                                <th>added by</th>
                                <th>insert at</th>
                                <th >image</th>
                                <th>status</th>
                                <th>operation</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($reem as $key)
                            <tr>
                                <td>{{ $key->id }}</td>
                                <td>{{ $key->task }}</td>
                                <td>{{ $key->user_id }}</td>
                                <td>{{ $key->insert_at }}</td>
                                <td>{{ $key->id }}</td>
                                <td>{{ $key->status }}</td>
                                <td>
                                    <a href="" class="btn btn-success">edit</a>
                                    <a href="" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection