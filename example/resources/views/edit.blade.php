<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <div>
        <form action="{{  route('notes.update') }}" method="post">
            @csrf
            <input type="hidden" value="{{ $data->id }}" name="id">
            <input type="text" value="{{ $data->notes }}" name="notes">
            <button type="submit">update</button>
        </form>
    </div>
</body>
</html>
