<!-- resources/views/pages/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Page</title>
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
        <h2>Page Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $page->title }}</h5>
                <p class="card-text">{{ $page->content }}</p>
                <p><strong>Category ID:</strong> {{ $page->category_id }}</p>
                <a href="{{ route('pages.index') }}" class="btn btn-primary">Back to List</a>
                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
