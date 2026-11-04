<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h2 class="fw-bold mb-3">Daftar Akun</h2>
                    <form wire:submit.prevent="register">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" wire:model="username" placeholder="username kamu">
                            @error('username') <small class="text-danger d-block mt-1">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" wire:model="email" placeholder="name@example.com">
                            @error('email') <small class="text-danger d-block mt-1">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" wire:model="password" placeholder="Minimal 6 karakter">
                            @error('password') <small class="text-danger d-block mt-1">{{ $message }}</small> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Daftar</button>

                        <div class="mt-3 text-center">
                            <span class="text-muted">Sudah punya akun?</span>
                            <a href="{{ route('login') }}" class="ms-1">Masuk</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
