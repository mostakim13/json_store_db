<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success text-right">
                {{ session()->get('message') }}
            </div>
        @endif
        <h1>Assignment For Full Stack Developer</h1>
        <div class="row">
            <div class="col-md-9 col-12 col-sm-12 col-lg-9 main-content">
                <div>
                    <input type="text" id="search" placeholder="Search" style="float: right">
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Body</th>
                            <th scope="col">Post id</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Username</th>
                        </tr>
                    </thead>
                    <tbody id="searchfromtable">
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->body }}</td>
                                <td>{{ $comment->postId }}</td>
                                <td>{{ $comment->users->id }}</td>
                                <td>{{ $comment->users->username }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-3 col-sm-12 col-lg-3 col-12 sidebar">
                <h4 class="title">Upload your Json file</h4>
                <div class="upload_file">
                    <form action="{{ route('upload-json') }}" method="POST" novalidate="novalidate" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file mb-2">
                            <input type="file" class="custom-file-input" name="file" id="customFile">
                        </div>
                        <input class="btn btn-primary btn-sm" name="submit" type="submit" value="Upload">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#searchfromtable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
<script src="js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
    crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>

</html>
