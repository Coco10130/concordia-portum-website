<ul class="nav flex-column m-0">
    <li class="nav-item">
        <a class="nav-link text {{ $category == 'violin' ? 'active' : '' }}"
            href="{{ route('products.index', ['category' => 'violin']) }}">Violin</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text {{ $category == 'trumpet' ? 'active' : '' }}"
            href="{{ route('products.index', ['category' => 'trumpet']) }}">Trumpet</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text {{ $category == 'saxophone' ? 'active' : '' }}"
            href="{{ route('products.index', ['category' => 'saxophone']) }}">Saxophone</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text {{ $category == 'piano' ? 'active' : '' }}"
            href="{{ route('products.index', ['category' => 'piano']) }}">Piano</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text {{ $category == 'clarinet' ? 'active' : '' }}"
            href="{{ route('products.index', ['category' => 'clarinet']) }}">Clarinet</a>
    </li>
</ul>

<style>
    .nav .nav-item .text {
        color: #000000;
        font-family: 'popppins';
        font-size: 20px;
        transition: color 0.3s, background-color 0.3s;
        padding: 10px 20px;
        border-radius: 20px;
    }

    .nav .nav-item .text:hover {
        color: #ffffff;
        background-color: #ff0000;
    }

    .nav ul li {
        margin: 20px 0;
    }
</style>
