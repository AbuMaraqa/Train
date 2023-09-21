@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card h-100">
            <div class="card-header">
                <h3>To Do List</h3>
            </div>
            <div class="card-body">
                <div class="">
                    <form action="{{ route('tasks.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Add task</label>
                                    <input type="text" class="form-control" value="{{ old('task') }}" name="task">
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
                                    <button class="btn btn-primary mt-4 w-25" style="" type="submit">Add</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Search</label>
                            <input onkeyup="searchAjax(this.value)" class="form-control" type="text" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
            <div id="showTable">
                <div class="row py-5">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>task</th>
                                    <th>added by</th>
                                    <th>insert at</th>
                                    <th>image</th>
                                    <th>status</th>
                                    <th>operation</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($reem as $key)
                                    <tr>
                                        <td>{{ $key->id }}</td>
                                        <td>{{ $key->task }}</td>
                                        <td>{{ $key['user']->name }}</td>
                                        <td>{{ $key->insert_at }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/image/' . $key->image) }}" class="img-thumbnail "
                                                style="height: 100px" alt="">
                                        </td>
                                        <td>
                                            <input @if($key->status == 1) checked @endif onclick="updateStatus({{ $key->id }})" id="status_{{ $key->id }}"
                                                type="checkbox">
                                        </td>
                                        <td>
                                            <a href="{{ route('task.edit', ['noor' => $key->id]) }}"
                                                class="btn btn-success">edit</a>
                                            <a href="{{ route('task.delete', ['noor' => $key->id]) }}"
                                                class="btn btn-danger">delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        function updateStatus(id) {
            let checked = 0;
            if (document.getElementById('status_'+id).checked) {
                checked = 1;
            } else {
                checked = 0;
            }
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Send an AJAX request with the CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.ajax({
                url: "{{ route('task.updateStatus') }}", // Replace with your own URL
                method: "post",
                data: {
                    'id': id,
                    'status': checked
                }, // Specify the expected data type
                success: function(data) {
                    console.log(data);
                },
                error: function(xhr, status, error) {
                    // This function is called when there is an error with the request
                    alert('error');
                }
            });

        }

        function searchAjax(value){
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Send an AJAX request with the CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.ajax({
                url: "{{ route('task.search') }}", // Replace with your own URL
                method: "post",
                data: {
                    'search':value
                }, // Specify the expected data type
                success: function(data) {
                    $('#showTable').html(data.view);
                },
                error: function(xhr, status, error) {
                    // This function is called when there is an error with the request
                    alert('error');
                }
            });
        }
    </script>
@endsection
