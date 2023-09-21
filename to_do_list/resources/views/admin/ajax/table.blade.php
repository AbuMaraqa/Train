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
        @foreach ($data as $key)
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
