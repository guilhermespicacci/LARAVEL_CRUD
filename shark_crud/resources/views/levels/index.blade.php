<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <title>Sharks App</title>
</head>
<body>

    <x-level-navbar></x-level-navbar>


    <div class="container">
        <h1>Shark Level List</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Level</th>
                    <th>Level Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($levels as $level)
                    <tr>
                        <td scope='col'>{{ $level->id }}</td>
                        <td scope='col'>{{ $level->level }}</td>
                        <td scope="col">{{$level->number_level}}</td>
                        <td>
                            <form class="btn btn-danger" action="{{url("shark/levels/".$level->id)}} " method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-small btn-danger" type="submit">DELETE</button>
                            </form>
                           <a class="btn btn-small btn-success" href={{"levels/". $level->id}}>Show</a>
                           <a class="btn btn-small btn-info" href={{"levels/{$level->id}/edit"}}>Edit</a>
                        </td>
                    </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
</body>
</html>