<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Articles</h1>
        <form class="form-inline" style="float: right" action="" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Article Title" aria-label="Search">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
        <br><br>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Published Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr class="text-justify">
                        <td scope="col">
                            {{ $article->id }}
                        </td>
                        <td>
                            {{ $article->title }}
                        </td>
                        <td>
                            {{ $article->description }}
                        </td>
                        <td>
                            {{ $article->published_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $articles->links() }}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
