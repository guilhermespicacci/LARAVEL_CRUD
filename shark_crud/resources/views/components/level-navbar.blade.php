<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('sharks') }}">shark Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{route('levels.index')}}">Levels</a></li>
        <li><a href="{{route('levels.create')}}">Create A Level</a></li>
        <li><a href="{{ route('sharks.index') }}">sharks</a></li>
       
        
    </ul>
</nav>