<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-icon-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                            <i class="fas fa-bolt"></i>
                        @else
                            <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo">
                        @endif
                    </div>
                    <div class="title">VoltCart</div>
                </a>
            </div>
        </div>
        <div id="adminmenu">
            <admin-menu :items="{{ menu('admin', '_json') }}"></admin-menu>
        </div>
    </nav>
</div>

<style>
    .side-menu {
        background: #2c3e50 !important;
        height: 100vh;
        overflow-y: auto;
    }

    .side-menu .navbar-header {
        padding: 15px 0;
        text-align: center;
        border-bottom: 1px solid #34495e;
        margin-bottom: 10px;
    }

    .side-menu .navbar-brand {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
    }

    .side-menu .navbar-brand .logo-icon-container i {
        font-size: 22px;
        color: #f1c40f;
    }

    .side-menu .navbar-brand .logo-icon-container img {
        max-height: 30px;
        width: auto;
    }

    .side-menu .navbar-brand .title {
        font-size: 1.1rem;
        font-weight: bold;
        color: white;
    }

    .side-menu .nav {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .side-menu .nav li a {
        color: #ecf0f1 !important;
        padding: 10px 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
    }

    .side-menu .nav li a i {
        width: 20px;
        color: #bdc3c7;
    }

    .side-menu .nav li a:hover {
        background: #34495e !important;
    }

    .side-menu .nav li.active a {
        background: #3498db !important;
        color: white !important;
    }

    .side-menu .nav li.active a i {
        color: white !important;
    }

    .side-menu .nav li.dropdown > a:after {
        content: '\f107';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        float: right;
    }

    .side-menu .nav li.dropdown.open > a:after {
        content: '\f106';
    }

    .side-menu .dropdown-menu {
        background: #34495e !important;
        list-style: none;
        padding: 5px 0;
        display: none;
    }

    .side-menu .dropdown.open .dropdown-menu {
        display: block;
    }

    .side-menu .dropdown-menu li a {
        padding-left: 35px;
    }

    @media (max-width: 768px) {
        .side-menu {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 260px;
            transform: translateX(-100%);
            transition: transform 0.3s;
            z-index: 1000;
        }

        .side-menu.open {
            transform: translateX(0);
        }

        .menu-toggle {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: #3498db;
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1001;
            border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
            display: none;
        }

        .menu-overlay.active {
            display: block;
        }
    }

    @media (min-width: 769px) {
        .menu-toggle,
        .menu-overlay {
            display: none !important;
        }
    }
</style>

<script>
    (function() {
        if (window.innerWidth <= 768) {
            if (!document.querySelector('.menu-toggle')) {
                var toggle = document.createElement('button');
                toggle.className = 'menu-toggle';
                toggle.innerHTML = '<i class="fas fa-bars"></i>';
                document.body.appendChild(toggle);

                var overlay = document.createElement('div');
                overlay.className = 'menu-overlay';
                document.body.appendChild(overlay);

                var sidebar = document.querySelector('.side-menu');

                toggle.onclick = function() {
                    sidebar.classList.add('open');
                    overlay.classList.add('active');
                    toggle.innerHTML = '<i class="fas fa-times"></i>';
                };

                overlay.onclick = function() {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                    toggle.innerHTML = '<i class="fas fa-bars"></i>';
                };

                sidebar.addEventListener('click', function(e) {
                    if (e.target.tagName === 'A' && !e.target.closest('.dropdown')) {
                        setTimeout(function() {
                            sidebar.classList.remove('open');
                            overlay.classList.remove('active');
                            toggle.innerHTML = '<i class="fas fa-bars"></i>';
                        }, 100);
                    }
                });
            }
        }

        var dropdowns = document.querySelectorAll('.side-menu .dropdown > a');
        for (var i = 0; i < dropdowns.length; i++) {
            dropdowns[i].onclick = function(e) {
                e.preventDefault();
                var parent = this.parentElement;
                parent.classList.toggle('open');
            };
        }
    })();
</script>

<script>
    if (!document.querySelector('link[href*="font-awesome"]')) {
        var link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css';
        document.head.appendChild(link);
    }
</script>
