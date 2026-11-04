<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <h2 class="fw-bold mb-1">Form Pemesanan</h2>
                        <p class="text-muted mb-0">Isi detail pemesanan tiket film Anda.</p>
                    </div>

                    <form wire:submit.prevent="submitOrder">
                        <div class="mb-3">
                            <label class="form-label">Judul Film</label>
                            <input type="text" class="form-control" value="{{ $movie_name ?? 'Film' }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga Per Tiket</label>
                            <input type="text" class="form-control" value="Rp {{ number_format($movie_price ?? 35000, 0, ',', '.') }}" disabled>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Jam Tayang</label>
                                <input type="time" class="form-control" wire:model="watch_at">
                                @error('watch_at') <small class="text-danger d-block mt-1">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Jumlah Tiket</label>
                                <input type="number" min="1" class="form-control" wire:model="ticket">
                                @error('ticket') <small class="text-danger d-block mt-1">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="row g-3 mt-1">
                            <div class="col-md-6">
                                <label class="form-label">Nomor Kursi</label>
                                <input type="text" class="form-control" wire:model="seat" placeholder="A1">
                                @error('seat') <small class="text-danger d-block mt-1">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Total Harga</label>
                                <input type="text" class="form-control" value="Rp {{ number_format($total_price ?? 38500, 0, ',', '.') }}" disabled>
                            </div>
                        </div>

                        <div class="mt-4 border rounded p-3 bg-light">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Harga dasar</span>
                                <strong>Rp {{ number_format($movie_price ?? 35000, 0, ',', '.') }}</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Pajak (10%)</span>
                                <strong>Rp {{ number_format($tax_amount ?? 3500, 0, ',', '.') }}</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Jumlah tiket</span>
                                <strong>{{ $ticket ?? 1 }} buah</strong>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Total</span>
                                <span class="fw-bold text-primary fs-5">Rp {{ number_format($total_price ?? 38500, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Bukti Pembayaran</label>
                            <input type="file" class="form-control" wire:model="proof_of_payment">
                            @error('proof_of_payment') <small class="text-danger d-block mt-1">{{ $message }}</small> @enderror
                        </div>

                        @if (session()->has('message'))
                            <div class="alert alert-success mt-3 mb-0">{{ session('message') }}</div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary px-4">Bayar & Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
