<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<x-shark-navbar></x-shark-navbar>
<h1>Showing {{ $shark->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $shark->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $shark->email }}<br>
            <strong>Level:</strong> {{ $shark->level_name }}
        </p>
    </div>

</div>
</body>
</html>