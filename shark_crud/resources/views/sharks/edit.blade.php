<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">


    <x-shark-navbar></x-shark-navbar>

<h1>Edit {{ $shark->name }}</h1>

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

<form method="POST" action="{{ route('sharks.update', $shark->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $shark->name }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $shark->email }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="shark_level">Shark Level</label>
        <select name="shark_level" class="form-control">
            <option value="0">Select a Level</option>
            <option value="1" {{ $shark->shark_level == 1 ? 'selected' : '' }}>Sees Sunlight</option>
            <option value="2" {{ $shark->shark_level == 2 ? 'selected' : '' }}>Foosball Fanatic</option>
            <option value="3" {{ $shark->shark_level == 3 ? 'selected' : '' }}>Basement Dweller</option>
            <option value="4" {{ $shark->shark_level == 4 ? 'selected' : '' }}>King of the Deep</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Edit the shark!</button>
</form>

</div>
</body>
</html>
