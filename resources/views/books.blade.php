<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>books</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Data Books</h1>
        {{-- @foreach ($books as $item)
            <ul>
                <li>{{ $item['title'] }}</li>
                <li>{{ $item['description'] }}</li>
                <li>{{ $item['price'] }}</li>
                <li>{{ $item['stock'] }}</li>
                <li>{{ $item['cover_photo'] }}</li>
                <li>{{ $item['genre_id'] }}</li>
                <li>{{ $item['author_id'] }}</li>
            </ul>
        @endforeach --}}
        
        @foreach ($books as $book)
            <ul class="list-group mb-3">
                    <li class="list-group-item"><strong>Title:</strong> {{ $book['title'] }}</li>
                    <li class="list-group-item"><strong>Description:</strong> {{ $book['description'] }}</li>
                    <li class="list-group-item"><strong>Price:</strong> {{ $book['price'] }}</li>
                    <li class="list-group-item"><strong>Stock:</strong> {{ $book['stock'] }}</li>
                    <li class="list-group-item"><strong>Image:</strong> {{ $book['cover_photo'] }}</li>
                    <li class="list-group-item"><strong>Id Genre:</strong> {{ $book['genre_id'] }}</li>
                    <li class="list-group-item"><strong>Id Author:</strong> {{ $book['author_id'] }}</li>
                </ul>
        @endforeach
    </div>
</body>
</html>