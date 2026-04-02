<nav class="navbar navbar-expand-lg fixed-top" style="background: linear-gradient(135deg, #44ACFF 0%, #89D4FF 100%); box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" style="color: #F9F6C4; display: flex; align-items: center;">
            @php
                // التحقق من وجود اللوجو في المسار الصحيح
                $logoPath = '';
                $possiblePaths = [
                    'images/logo',
                    'images/logo.png',
                    'images/logo.jpg',
                    'images/logo.svg',
                    'images/logo.webp'
                ];

                foreach($possiblePaths as $path) {
                    if(file_exists(public_path($path))) {
                        $logoPath = asset($path);
                        break;
                    }
                }
            @endphp

            @if($logoPath)
                <img src="{{ $logoPath }}" alt="VoltCart" height="35" style="margin-right: 8px; filter: brightness(0) invert(1);">
            @else
                <i class="fas fa-bolt" style="font-size: 28px; margin-right: 8px; color: #F9F6C4;"></i>
            @endif
            <span style="font-weight: 700; color: #F9F6C4; font-size: 1.5rem;">VoltCart</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border-color: #F9F6C4;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{ menu('main', 'partials.menu.main') }}
            <div>
                <input id="search" name="search" style="width:350px; margin:0; border-radius: 25px; border: none; padding: 8px 15px; background: rgba(255,255,255,0.95);" class="form-control" placeholder="Search products..." aria-label="Search">
            </div>
        </div>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}" style="color: #F9F6C4; font-weight: 500;">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}" style="color: #F9F6C4; font-weight: 500;">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            @if (auth()->user()->can('browse_admin'))
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin') }}" style="color: #F9F6C4; font-weight: 500;">Admin Panel</a>
            </li>
            @endif
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #F9F6C4; font-weight: 500;">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="border-top: 3px solid #FE9EC7;">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" style="color: #44ACFF;">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</nav>
<div id="cont">
    <ul style="height:4em"></ul>
</div>

<script>
    var searcher = $('#search')
    searcher.on('keypress', function(e) {
        if (e.which == 13) {
            if (searcher.val().length > 2) {
                location.href = '/shop/search/' + searcher.val();
            } else {
                alert('Minimun query length is 3');
            }
        }
    });
</script>

<style>
    .navbar-brand:hover {
        opacity: 0.9;
        transition: opacity 0.2s;
        transform: scale(1.02);
    }

    #search:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(254, 158, 199, 0.3);
        border-color: #FE9EC7;
        background: white;
    }

    .navbar-nav .nav-link {
        transition: all 0.2s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #FE9EC7 !important;
        transform: translateY(-1px);
    }

    .dropdown-item:hover {
        background-color: #F9F6C4;
        color: #44ACFF !important;
    }

    @media (max-width: 992px) {
        #search {
            width: 100% !important;
            margin-top: 10px !important;
        }

        .navbar-collapse {
            background: linear-gradient(135deg, #44ACFF 0%, #89D4FF 100%);
            padding: 15px;
            border-radius: 10px;
            margin-top: 10px;
        }
    }
</style>
