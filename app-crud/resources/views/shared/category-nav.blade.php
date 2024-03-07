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
    ul {
        display: flex;
    }

    ul .nav-item {
        list-style: none;
    }

    ul .nav-item .text {
        position: relative;
        display: block;
        text-transform: uppercase;
        margin: 10px 0;
        padding: 10px 20px;
        text-decoration: none;
        color: #000000;
        font-family: 'Owswald';
        font-size: 18px;
        font-weight: 600;
        transition: .5s;
        z-index: 1;
    }

    ul .nav-item .text:before,
    ul .nav-item .text:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-top: 2px solid #000000;
        border-bottom: 2px solid #000000;
        transform: scaleY(2);
        opacity: 0;
        transition: .3s;
        z-index: -1;
    }

    ul .nav-item .text:hover:before,
    ul .nav-item .text.active:before,
    ul .nav-item .text:hover:after,
    ul .nav-item .text.active:after {
        transform: scaleY(1);
        opacity: 1;
    }

    ul .nav-item .text:hover,
    ul .nav-item .text.active:hover {
        color: #000000; /* Change font color to white */
    }
</style>
