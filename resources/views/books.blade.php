<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>books</title>
</head>
<body>
    <h1>Hello Word</h1>
    <p>Selamat datang di toko BookSales</p>

    @foreach ($books as $item)
        <ul>
            <li>{{ $item['title'] }}</li>
            <li>{{ $item['description'] }}</li>
            <li>{{ $item['price'] }}</li>
            <li>{{ $item['stock'] }}</li>
            <li>{{ $item['cover_photo'] }}</li>
            <li>{{ $item['genre_id'] }}</li>
            <li>{{ $item['author_id'] }}</li>
        </ul>
    @endforeach
</body>
</html>