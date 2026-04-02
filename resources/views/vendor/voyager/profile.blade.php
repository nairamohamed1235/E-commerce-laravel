@extends('voyager::master')

@section('css')
    <style>
        /* VoltCart Profile Styles */
        :root {
            --volt-pink: #FE9EC7;
            --volt-yellow: #F9F6C4;
            --volt-light-blue: #89D4FF;
            --volt-blue: #44ACFF;
            --volt-gradient: linear-gradient(135deg, #44ACFF 0%, #89D4FF 100%);
        }

        .profile-header {
            background: linear-gradient(135deg, #44ACFF 0%, #89D4FF 100%);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 280px;
            overflow: hidden;
        }

        .profile-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,170.7C1248,160,1344,128,1392,112L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>');
            background-repeat: no-repeat;
            background-position: bottom;
            background-size: cover;
            opacity: 0.3;
        }

        .profile-spacer {
            height: 180px;
            display: block;
            width: 100%;
        }

        .profile-card {
            position: relative;
            z-index: 9;
            text-align: center;
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin: 0 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            transition: transform 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
        }

        .profile-avatar {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            border: 4px solid #44ACFF;
            box-shadow: 0 5px 15px rgba(68,172,255,0.3);
            object-fit: cover;
            margin-top: -80px;
            background: white;
        }

        .profile-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #44ACFF, #89D4FF);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .profile-email {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .profile-bio {
            color: #2c3e50;
            margin-bottom: 1.5rem;
            padding: 0 1rem;
            line-height: 1.6;
        }

        .profile-stats {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 15px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #44ACFF;
        }

        .stat-label {
            font-size: 0.75rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-edit-profile {
            background: linear-gradient(135deg, #44ACFF, #89D4FF);
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-edit-profile:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(68,172,255,0.4);
            color: white;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .profile-header {
                height: 200px;
            }

            .profile-spacer {
                height: 120px;
            }

            .profile-card {
                margin: 0 15px;
                padding: 1.5rem;
            }

            .profile-avatar {
                width: 100px;
                height: 100px;
                margin-top: -60px;
            }

            .profile-name {
                font-size: 1.4rem;
            }

            .profile-stats {
                gap: 1rem;
            }

            .stat-number {
                font-size: 1.2rem;
            }
        }
    </style>
@stop

@section('content')
    <div class="profile-header"></div>
    <div class="profile-spacer"></div>

    <div class="profile-card">
        <img src="@if( !filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL)){{ Voyager::image( Auth::user()->avatar ) }}@else{{ Auth::user()->avatar }}@endif"
             class="profile-avatar"
             alt="{{ Auth::user()->name }} avatar">

        <h3 class="profile-name">{{ ucwords(Auth::user()->name) }}</h3>
        <div class="profile-email">
            <i class="fas fa-envelope me-1"></i> {{ Auth::user()->email }}
        </div>

        @if(Auth::user()->bio)
            <p class="profile-bio">{{ Auth::user()->bio }}</p>
        @endif

        <div class="profile-stats">
            <div class="stat-item">
                <div class="stat-number">{{ $totalOrders ?? 0 }}</div>
                <div class="stat-label">Orders</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ $totalSpent ?? 0 }}</div>
                <div class="stat-label">Total Spent</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ $memberSince ?? '' }}</div>
                <div class="stat-label">Member Since</div>
            </div>
        </div>

        @if ($route != '')
            <a href="{{ $route }}" class="btn-edit-profile">
                <i class="fas fa-edit"></i> Edit Profile
            </a>
        @endif
    </div>
@endsection

@push('javascript')
<script>
    // Add some dynamic data if needed
    document.addEventListener('DOMContentLoaded', function() {
        // You can add AJAX calls here to fetch real stats
        console.log('VoltCart Profile Page Loaded');
    });
</script>
@endpush
