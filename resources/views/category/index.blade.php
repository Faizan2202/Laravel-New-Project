<!-- resources/views/pages/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages List</title>
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
        <h2>Pages</h2>
        <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Create New Page</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>description</th>
                    <th>user_id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{{ $page->name }}</td>    
                    <td>{{ Str::limit($page->description, 50) }}</td>
                    <td>{{ $page->user->name }}</td>
                    <input type="hidden" value ="{{Auth::id()}}">
                    <td>
                        <a href="{{ route('category.show', $page->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('category.edit', $page->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('category.destroy', $page->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </body>
</html>
