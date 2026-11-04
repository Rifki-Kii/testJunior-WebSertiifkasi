<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Riwayat Pesanan</h2>
            <p class="text-muted mb-0">Daftar pesanan tiket yang Anda buat.</p>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali ke Film</a>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success" role="status">{{ session('message') }}</div>
    @endif

    @if ($orders->isEmpty())
        <div class="alert alert-info">Belum ada pesanan yang dibuat.</div>
    @else
        <div class="row g-3">
            @foreach ($orders as $order)
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                            <div>
                                <h5 class="fw-bold mb-1">{{ $order->movie_name }}</h5>
                                <p class="mb-1 text-muted">Kursi: {{ $order->seat }} | Waktu menonton: {{ \Carbon\Carbon::parse($order->watch_at)->format('H:i') }}</p>
                                <p class="mb-1 text-muted">Jumlah tiket: {{ $order->ticket }} | Total pembayaran: Rp {{ number_format($order->price, 0, ',', '.') }}</p>
                                <p class="mb-1 text-muted">Tanggal pemesanan: {{ $order->created_at?->format('d M Y') ?? '-' }}</p>
                                @if ($order->proof_of_payment)
                                    <a href="{{ asset('storage/' . $order->proof_of_payment) }}" target="_blank" rel="noopener noreferrer">
                                        Lihat bukti pembayaran
                                    </a>
                                @else
                                    <span class="text-muted">Bukti pembayaran belum diunggah</span>
                                @endif
                            </div>
                            <button type="button" class="btn btn-outline-danger" wire:click="cancelOrder({{ $order->id }})">
                                Batalkan
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
