<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">Laravel 10.X</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                <li class="{{ request()->routeIs('apropos') ? 'active' : '' }}"><a href="{{ route('apropos') }}">About</a></li>
                <li class="{{ request()->routeIs('services') ? 'active' : '' }}"><a href="{{ route('services') }}">Services</a></li>
            </ul>
             <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('products.create') }}">Nouveau produit</a></li>
            </ul>
        </div>
    </nav>