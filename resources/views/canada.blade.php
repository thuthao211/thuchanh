<html>
<head>
    <title>Danh sách phim Canada</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Danh sách bộ phim của Canada</h1>
    <table>
        <thead>
            <tr>
                <th>Tên bộ phim</th>
                <th>Ngày phát hành</th>
                <th>Thời lượng (phút)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ds_phim as $movie)
            <tr>
                <td>{{ $movie->movie_name }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->runtime }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>