<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            Магазин
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('orders') }}" class="nav-link active">
                        Мои заказы
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
