<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">


    <x-level-navbar></x-shark-navbar>

<h1>Edit {{ $level->name }}</h1>

<!-- if there are creation errors, they will show here -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('levels.update', $level->id) }}">
    @csrf
    @method('PUT')

    <div class="name">
        <label for="shark_level">Name</label>
        <input type="text" name="shark_level" value="{{ $level->level}}" class="form-control">
    </div>

    <div class="form-group">
        <label for="number_level">Email</label>
        <input type="number" name="number_level" value="{{ $level->number_level }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Edit the shark!</button>
</form>

</div>
</body>
</html>
