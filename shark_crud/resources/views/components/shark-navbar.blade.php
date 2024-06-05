<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('sharks') }}">shark Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ route('sharks.index') }}">View All sharks</a></li>
        <li><a href="{{ route('sharks.create') }}">Create a shark</a>
        <li><a href="{{route('levels.index')}}">levels</a></li>
    </ul>
</nav>