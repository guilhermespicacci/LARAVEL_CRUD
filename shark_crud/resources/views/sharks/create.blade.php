<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <x-shark-navbar></x-shark-navbar>

<h1>Create a Shark</h1>

<!-- Se houver erros de criação, eles serão exibidos aqui -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ url('sharks') }}">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label for="shark_level">Shark Level</label>
        <select class="form-control" id="shark_level" name="shark_level">
            <option value="0">Select a Level</option>
            <option value="1" {{ old('shark_level') == '1' ? 'selected' : '' }}>Sees Sunlight</option>
            <option value="2" {{ old('shark_level') == '2' ? 'selected' : '' }}>Foosball Fanatic</option>
            <option value="3" {{ old('shark_level') == '3' ? 'selected' : '' }}>Basement Dweller</option>
            <option value="4" {{ old('shark_level') == '4' ? 'selected' : '' }}>King of the Deep</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create the Shark!</button>
</form>

</div>
</body>
</html>
