<ul class="nav flex-column m-0">
    <li class="nav-item">
        <a class="nav-link text {{ $category == 'violin' ? 'active' : '' }}" href="{{ route('products.index', ['category' => 'violin']) }}">Violin</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text {{ $category == 'trumpet' ? 'active' : '' }}" href="{{ route('products.index', ['category' => 'trumpet']) }}">Trumpet</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text {{ $category == 'saxophone' ? 'active' : '' }}" href="{{ route('products.index', ['category' => 'saxophone']) }}">Saxophone</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text {{ $category == 'piano' ? 'active' : '' }}" href="{{ route('products.index', ['category' => 'piano']) }}">Piano</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text {{ $category == 'clarinet' ? 'active' : '' }}" href="{{ route('products.index', ['category' => 'clarinet']) }}">Clarinet</a>
    </li>
</ul>
