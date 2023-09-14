<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add</title>
</head>
<body>
    <form action="{{ route('notes.create') }}" method="post">
        @csrf
        <input name="notes" type="text" placeholder="Enter the note">
        <button type="submit">Add</button>
    </form>
</body>
</html>
