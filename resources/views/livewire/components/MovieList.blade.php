<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Daftar Film</h2>
            <p class="text-muted mb-0">Pilih film favorit Anda untuk memesan tiket.</p>
        </div>
        <a href="{{ route('history') }}" class="btn btn-outline-primary">Riwayat Pesanan</a>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if ($movies->isEmpty())
        <div class="alert alert-info">Belum ada film yang tersedia saat ini.</div>
    @else
        <div class="row g-4">
            @foreach ($movies as $movie)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ $movie->poster }}" class="card-img-top" alt="{{ $movie->title }}" style="height: 360px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $movie->title }}</h5>
                            <p class="text-muted mb-2">{{ $movie->genre }}</p>
                            <div class="fw-bold text-primary mb-3">Rp {{ number_format($movie->price ?? 0, 0, ',', '.') }}</div>
                            <div class="mt-auto">
                                <a href="{{ route('order', ['movie_id' => $movie->id]) }}" class="btn btn-primary w-100">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
