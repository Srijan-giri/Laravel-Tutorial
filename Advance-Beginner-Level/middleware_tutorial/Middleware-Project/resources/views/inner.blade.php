<div>
    <h2>Inner Page</h2>
    <p>{{ Auth::user()->name }}</p>
    <a href="{{ route(name: 'dashboard') }}">Dashboard Page</a>
</div>
