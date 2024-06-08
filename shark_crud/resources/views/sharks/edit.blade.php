<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">


    <x-shark-navbar></x-shark-navbar>

@php

@endphp


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
        @foreach ($levels as $level )
            
                     
            <option value="{{$level->number_level}}" {{$level->id == 
            $shark->foreign_id_level ? 'selected' : ''}}>
            {{$level->level}}
            </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Edit the shark!</button>
</form>

</div>
</body>
</html>
