<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Photos</h1>
        <br>
        <table class="table table-hover">
            <tr>
                <th>Id</th>
                <th>Photo Name</th>
                <th>Image</th>
                <th colspan="2">Actions</th>
            </tr>
            @foreach ($photos as $photo)
                <tr>
                    <td>
                        {{ $photo->id }}
                    </td>
                    <td>
                        {{ $photo->photo_name }}
                    </td>
                    <td>
                        <img src="{{ asset('images/' . $photo->path) }}" alt="" height="50" width="100">
                    </td>
                    <td>
                        <a href="{{ route('photo.edit', $photo->id) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('photo.delete', $photo->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
