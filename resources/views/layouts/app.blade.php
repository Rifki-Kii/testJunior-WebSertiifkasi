<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f7fb;
        }
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, #111827 0%, #0f172a 100%);
            color: white;
            position: sticky;
            top: 0;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            border-radius: 10px;
            padding: 12px 14px;
            margin: 6px 10px;
            transition: 0.2s ease;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.08);
            color: white;
        }
        .content-area {
            flex: 1;
            min-width: 0;
        }
        .topbar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
        }
    </style>
    @livewireStyles
</head>
<body>
    @auth
        <div class="d-flex">
            <aside class="sidebar p-3">
                <div class="d-flex align-items-center mb-4 px-2">
                    
                    <div>
                        <div class="fw-bold">Movie App - Kii</div>
                        <small class="text-light text-opacity-75">Cinema Ticket</small>
                    </div>
                </div>

                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="bi bi-film"></i> Daftar Film
                    </a>
                    <a class="nav-link {{ request()->routeIs('history') ? 'active' : '' }}" href="{{ route('history') }}">
                        <i class="bi bi-clock-history"></i> History
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-3 px-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-light w-100">Logout</button>
                    </form>
                </nav>
            </aside>

            <div class="content-area">
                <div class="topbar p-3 px-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 fw-bold">{{ request()->routeIs('dashboard') ? 'Dashboard' : (request()->routeIs('history') ? 'History' : 'Pesan Tiket') }}</h5>
                    </div>
                    <div class="text-muted small">{{ auth()->user()->username ?? auth()->user()->email }}</div>
                </div>

                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    @else
        <main>
            {{ $slot }}
        </main>
    @endauth

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>
