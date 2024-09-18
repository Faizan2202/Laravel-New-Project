<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
    <div class="container mt-5">
        {{Auth::id()}}
        <h2>Create New Entry</h2>
        <form action="{{route('pages.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="name" name="title" placeholder="Enter your title">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::id() }}">
            </div>
            <div class="form-group">
                <label for="content">content</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category ID</label>
                <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Enter category ID">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
