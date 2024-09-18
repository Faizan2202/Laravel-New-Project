<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Add Bootstrap CSS for styling if needed -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(Auth::check())
    <p>{{ Auth::user()->name }}</p>
    <!-- Logout Form -->
    <form action="{{ route('logout') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@else
    <p>No user is logged in.</p>
@endif

<a href="pages">Pages</a><br>
<a href="category">category</a>
</body>
</html>
