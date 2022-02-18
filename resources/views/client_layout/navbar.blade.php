<div class="py-1 bg-dark">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">+261 34 65 948 21</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">solofoojm@gmail.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">{{ __('CONTACT-US') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid bg-dark">
        <a class="navbar-brand text-danger" href="{{ url('/') }}">{{ __('ONLINE SALES') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse " id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __(trans_choice('Language|Languages', 2)) }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/language/fr">{{ __('French') }}</a></li>
                        <li><a class="dropdown-item" href="/language/en">{{ __('English') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item active" style = "width: 6rem;"><a href="{{ url('/') }}"
                        class="nav-link text-info">{{ __('Home') }}</a></li>
                <li class="nav-item active"><a href="{{ url('/shop') }}"
                        class="nav-link text-info">{{ __('Shop') }}</a></li>

                <li class="nav-item cta cta-colored"><a href="{{ url('/cart') }}" class="nav-link text-success"><span
                            class="icon-shopping_cart text-info"></span>{{ Session::has('cart') ? Session::get('cart')->totalQty : 0 }}</a>
                </li>

                @if (Session::has('client'))
                    <li class="nav-item active"><a href="{{ url('/logout') }}" class="nav-link text-info"><span
                                class="fa fa-user"></span>{{ __('Logout') }}</a></li>
                @else
                    <li class="nav-item active"><a href="{{ url('/login') }}" class="nav-link text-info"><span
                                class="fa fa-user"></span>{{ __('Login') }}</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
