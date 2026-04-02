<ul class="navbar-nav mr-auto">
    <li class="nav-item {{ request()->route()->getName() == 'shop.index' ? 'active': '' }}">
        <a class="nav-link" href="{{ route('shop.index') }}" style="color: #F9F6C4; font-weight: 500;">
            <i class="fas fa-store me-1"></i> Shop
        </a>
    </li>
    <li class="nav-item {{ request()->route()->getName() == 'about' ? 'active': '' }}">
        <a class="nav-link" href="{{ route('about') }}" style="color: #F9F6C4; font-weight: 500;">
            <i class="fas fa-info-circle me-1"></i> About
        </a>
    </li>
    <li class="nav-item {{ request()->route()->getName() == 'cart.index' ? 'active': '' }}">
        <a class="nav-link" href="{{ route('cart.index') }}" style="color: #F9F6C4; font-weight: 500; position: relative;">
            <i class="fas fa-shopping-cart me-1"></i> Cart
            @if (Cart::instance('default')->count() > 0)
                <span class="badge" style="background: #FE9EC7; color: white; margin-left: 5px; padding: 3px 6px; border-radius: 50%; font-size: 10px;">
                    {{ Cart::instance('default')->count() }}
                </span>
            @endif
        </a>
    </li>
</ul>

<style>
/* Active menu item styling */
.nav-item.active .nav-link {
    color: #FE9EC7 !important;
    font-weight: 600;
    position: relative;
}

.nav-item.active .nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: #FE9EC7;
    border-radius: 2px;
}

/* Menu item hover effect */
.nav-item .nav-link:hover {
    color: #FE9EC7 !important;
    transform: translateY(-1px);
    transition: all 0.2s ease;
}
</style>
