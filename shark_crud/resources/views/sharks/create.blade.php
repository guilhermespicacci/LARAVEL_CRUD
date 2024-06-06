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
            @if (!$levels->all() )
                <li>There are no Levels for the Shark, Please create a Level in <a href="{{route("levels.create")}}">Create Your Shark Level</a></li>            
            @endif
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
            <option value="">Select a Level</option>
            @foreach ($levels as $level )
            <option value="{{$level->level}}">{{$level->level}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create the Shark!</button>
</form>

</div>
</body>
</html>
