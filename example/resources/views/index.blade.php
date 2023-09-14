<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>

    <style>
        td,td,th{
            border: solid 1px black;
        }
    </style>
</head>
<body>
    <div>
        @if (Session::has('success'))
            <div>{{ Session::get('success') }}</div>
        @elseif(Session::has('fail'))
            <div>{{ Session::get('fail') }}</div>
        @endif
    </div>
    <div>
        <a href="{{ route('notes.add') }}">Add</a>
    </div>
    <div>
        <table style="border: 1px solid black;width:600px">
            <tr>
                <th>id</th>
                <th>note</th>
                <th>العمليات</th>
            </tr>
            @foreach ($data as $key)
            <tr>
                <td>{{ $key->id }}</td>
                <td>{{ $key->notes }}</td>
                <td>
                    <a href="">edit</a>
                    <a href="">delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
