<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<x-level-navbar></x-shark-navbar>
<h1>Showing {{ $level->id }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $level->level  }}</h2>
        <p>
            
            <strong>Class level:</strong> {{ $level->number_level}}
        </p>
    </div>

</div>
</body>
</html>