<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <h2>Upadte Entry</h2>
        <form action="{{route('pages.update', $page->id)}}" method ="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">title</label>
                <input type="text" class="form-control" id="name" name ="title" placeholder="Enter your name" value="{{$page->title}}">
            </div>
            <div class="form-group">
                <label for="email">content</label>
                <textarea name="content" id=""value="{{$page->content}}"></textarea>t
            </div>
            <div class="form-group">
                <label for="password">category_id</label>
                <input type="text" class="form-control" id="password" name="category_id"value="{{$page->category_id}}" placeholder="Enter your password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
