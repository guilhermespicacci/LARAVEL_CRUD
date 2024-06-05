<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shark App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <x-level-navbar></x-level-navbar>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    
    <form method="POST" action="{{route('levels.store')}}">
        @csrf
        <div class="form-group">

          <label for="sharklevel">Shark Level</label>
          <input type="text" class="form-control" id="sharklevel" name="shark_level"  placeholder="Enter Level Name">
          
          <label for="number_level"   >Number Level</label>
          <input type="number" id="number_level" name="number_level" class="form-control" placeholder="Enter the number level">

        </div>
        <button type="submit" class="btn btn-primary">Create Shark Level</button>
      </form>
</body>
</html>