<nav class="navbar navbar-default navbar-fixed-top navbar-top" style="background: white; border-bottom: 1px solid rgba(68,172,255,0.2); box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="hamburger btn-link" style="color: #44ACFF;">
                <span class="hamburger-inner"></span>
            </button>
            @section('breadcrumbs')
            <ol class="breadcrumb hidden-xs" style="background: transparent; margin-top: 12px;">
                @php
                $segments = array_filter(explode('/', str_replace(route('voyager.dashboard'), '', Request::url())));
                $url = route('voyager.dashboard');
                @endphp
                @if(count($segments) == 0)
                    <li class="active" style="color: #44ACFF;">
                        <i class="voyager-bolt" style="color: #44ACFF;"></i> {{ __('voyager::generic.dashboard') }}
                    </li>
                @else
                    <li>
                        <a href="{{ route('voyager.dashboard') }}" style="color: #6c757d;">
                            <i class="voyager-bolt" style="color: #44ACFF;"></i> {{ __('voyager::generic.dashboard') }}
                        </a>
                    </li>
                    @foreach ($segments as $segment)
                        @php
                        $url .= '/'.$segment;
                        @endphp
                        @if ($loop->last)
                            <li class="active" style="color: #44ACFF; font-weight: 500;">{{ ucfirst(urldecode($segment)) }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}" style="color: #6c757d;">{{ ucfirst(urldecode($segment)) }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ol>
            @show
        </div>
        <ul class="nav navbar-nav @if (__('voyager::generic.is_rtl') == 'true') navbar-left @else navbar-right @endif">
            <li class="dropdown profile">
                <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                   aria-expanded="false" style="display: flex; align-items: center; gap: 8px; padding: 10px 15px;">
                    <img src="{{ $user_avatar }}" class="profile-img" style="width: 35px; height: 35px; border-radius: 50%; border: 2px solid #44ACFF; object-fit: cover;">
                    <span class="caret" style="color: #44ACFF;"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-animated" style="border-radius: 12px; border: none; box-shadow: 0 5px 20px rgba(0,0,0,0.1); margin-top: 10px; min-width: 220px;">
                    <li class="profile-img" style="padding: 15px; text-align: center; background: linear-gradient(135deg, #44ACFF, #89D4FF); border-radius: 12px 12px 0 0;">
                        <img src="{{ $user_avatar }}" class="profile-img" style="width: 60px; height: 60px; border-radius: 50%; border: 3px solid #F9F6C4; margin-bottom: 10px;">
                        <div class="profile-body">
                            <h5 style="color: white; margin: 5px 0 2px; font-size: 1rem; font-weight: 600;">{{ Auth::user()->name }}</h5>
                            <h6 style="color: rgba(255,255,255,0.9); margin: 0; font-size: 0.75rem;">{{ Auth::user()->email }}</h6>
                        </div>
                    </li>
                    <li class="divider" style="margin: 0;"></li>
                    <?php $nav_items = config('voyager.dashboard.navbar_items'); ?>
                    @if(is_array($nav_items) && !empty($nav_items))
                    @foreach($nav_items as $name => $item)
                    <li {!! isset($item['classes']) && !empty($item['classes']) ? 'class="'.$item['classes'].'"' : '' !!}>
                        @if(isset($item['route']) && $item['route'] == 'voyager.logout')
                        <form action="{{ route('voyager.logout') }}" method="POST" style="margin: 0;">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-block" style="background: #FE9EC7; border: none; border-radius: 0; padding: 10px; text-align: left; transition: all 0.3s ease;">
                                @if(isset($item['icon_class']) && !empty($item['icon_class']))
                                <i class="{!! $item['icon_class'] !!}" style="margin-right: 8px;"></i>
                                @endif
                                {{__($name)}}
                            </button>
                        </form>
                        @else
                        <a href="{{ isset($item['route']) && Route::has($item['route']) ? route($item['route']) : (isset($item['route']) ? $item['route'] : '#') }}"
                           {!! isset($item['target_blank']) && $item['target_blank'] ? 'target="_blank"' : '' !!}
                           style="display: block; padding: 10px 20px; color: #2c3e50; transition: all 0.3s ease;">
                            @if(isset($item['icon_class']) && !empty($item['icon_class']))
                            <i class="{!! $item['icon_class'] !!}" style="margin-right: 8px; color: #44ACFF;"></i>
                            @endif
                            {{__($name)}}
                        </a>
                        @endif
                    </li>
                    @endforeach
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</nav>

<style>
    /* VoltCart Navbar Styles */
    .navbar-top {
        background: white !important;
        border-bottom: 1px solid rgba(68, 172, 255, 0.2) !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05) !important;
        padding: 5px 0;
    }

    /* Hamburger Button */
    .hamburger {
        color: #44ACFF !important;
        transition: all 0.3s ease;
    }

    .hamburger:hover {
        color: #89D4FF !important;
        transform: scale(1.05);
    }

    /* Breadcrumbs */
    .breadcrumb {
        background: transparent;
        margin-bottom: 0;
        padding: 8px 0;
    }

    .breadcrumb > li + li:before {
        content: '/';
        color: #89D4FF;
        padding: 0 5px;
    }

    .breadcrumb > li a {
        transition: color 0.3s ease;
    }

    .breadcrumb > li a:hover {
        color: #44ACFF !important;
        text-decoration: none;
    }

    /* Profile Dropdown */
    .profile .dropdown-toggle {
        transition: all 0.3s ease;
    }

    .profile .dropdown-toggle:hover {
        background: rgba(68, 172, 255, 0.05) !important;
    }

    .dropdown-menu {
        border-radius: 12px;
        border: none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-menu li a {
        transition: all 0.3s ease;
    }

    .dropdown-menu li a:hover {
        background: rgba(68, 172, 255, 0.1) !important;
        color: #44ACFF !important;
        padding-left: 25px;
    }

    .dropdown-menu .btn-danger {
        transition: all 0.3s ease;
    }

    .dropdown-menu .btn-danger:hover {
        background: #ff85b3 !important;
        transform: translateX(5px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .breadcrumb {
            display: none;
        }

        .profile .dropdown-toggle {
            padding: 8px 10px;
        }

        .profile .dropdown-toggle .profile-img {
            width: 30px;
            height: 30px;
        }

        .dropdown-menu {
            min-width: 200px;
        }
    }

    /* Active breadcrumb */
    .breadcrumb > .active {
        color: #44ACFF;
        font-weight: 500;
    }

    /* Icon styling */
    .voyager-bolt {
        font-family: 'voyager' !important;
        font-size: 14px;
    }

    /* Make sure icons are visible */
    .navbar-top i {
        color: #44ACFF;
    }
</style>

<script>
    // Add Font Awesome icons if needed
    document.addEventListener('DOMContentLoaded', function() {
        // Add hover effect to dropdown items
        const dropdownItems = document.querySelectorAll('.dropdown-menu li a:not(.btn-danger)');
        dropdownItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
            });
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });
    });
</script>
