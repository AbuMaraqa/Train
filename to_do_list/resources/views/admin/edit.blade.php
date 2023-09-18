@extends('layouts.app')
@section('content')
<form action="{{ route('task.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <input type="hidden" name="queen_rodaina" value="{{ $data->id }}">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">edit task</label>

                <input type="text" class="form-control" name="task" value="{{ $data->task }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="">image</label>
                <input type="file" class="form-control" name="image">
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <button class="btn btn-primary mt-4 w-25" style="" type="submit">update</button>
            </div>
        </div>
    </div>
    <div class="row">
        <img src="{{ asset('storage/image/'.$data->image) }}" style="width: 300px" alt="">
    </div>
</form>
@endsection
