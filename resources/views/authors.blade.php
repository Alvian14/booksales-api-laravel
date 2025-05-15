<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atuhors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Data Authors</h1>
        {{-- @foreach ($authors as $item)
            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>ID:</strong> {{ $item['id'] }}</li>
                <li class="list-group-item"><strong>Nama:</strong> {{ $item['name'] }}</li>
                <li class="list-group-item"><strong>Photo:</strong> {{ $item['photo'] }}</li>
                <li class="list-group-item"><strong>Bio:</strong> {{ $item['bio'] }}</li>
            </ul>
        @endforeach --}}

        @foreach ($authors as $author)
            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Name:</strong> {{ $author['name'] }}</li>
                <li class="list-group-item"><strong>Photo:</strong> {{ $author['photo'] }}</li>
                <li class="list-group-item"><strong>Bio:</strong> {{ $author['bio'] }}</li>
            </ul>
        @endforeach
    </div>
</body>
</html>
