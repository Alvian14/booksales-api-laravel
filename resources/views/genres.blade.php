<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h1 class="mb-4">Data Genres</h1>

        {{-- @foreach ($genres as $item)
            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>ID:</strong> {{ $item['id'] }}</li>
                <li class="list-group-item"><strong>Nama:</strong> {{ $item['name'] }}</li>
                <li class="list-group-item"><strong>Deskripsi:</strong> {{ $item['description'] }}</li>
            </ul>
        @endforeach --}}

        @foreach ($genres as $genre)
            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Name:</strong> {{ $genre['name'] }}</li>
                <li class="list-group-item"><strong>Description:</strong> {{ $genre['description'] }}</li>
            </ul>
        @endforeach
    </div>
</body>
</html>
