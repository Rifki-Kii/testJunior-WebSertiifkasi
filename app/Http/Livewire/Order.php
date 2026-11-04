<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use App\Models\Order as OrderModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Order extends Component
{
    use WithFileUploads;

    private const TAX_RATE = 0.10;

    public $movie_id;

    public $movie_name;

    public $movie_price = 35000;

    public $subtotal_price = 35000;

    public $tax_amount = 3500;

    public $total_price = 38500;

    public $watch_at = '12:30';

    public $seat;

    public $ticket = 1;

    public $proof_of_payment;

    public function getTaxRateProperty(): float
    {
        return self::TAX_RATE;
    }

    public function mount($movie_id = null): void
    {
        $this->watch_at = $this->watch_at ?: '12:30';

        $movie = $movie_id
            ? Movie::findOrFail($movie_id)
            : Movie::query()->where('title', 'The Batman')->first();

        if ($movie) {
            $this->movie_id = $movie->id;
            $this->movie_name = $movie->title;
            $this->movie_price = (float) ($movie->price ?? 35000);
        } else {
            $this->movie_price = 35000;
        }

        $this->recalculatePricing();
    }

    protected function recalculatePricing(): void
    {
        $basePrice = (float) ($this->movie_price > 0 ? $this->movie_price : 35000);
        $this->subtotal_price = (int) ($basePrice * max(1, (int) $this->ticket));
        $this->tax_amount = (int) ($this->subtotal_price * self::TAX_RATE);
        $this->total_price = (int) ($this->subtotal_price + $this->tax_amount);
    }

    public function updatedTicket(): void
    {
        $this->recalculatePricing();
    }

    public function updatedMoviePrice(): void
    {
        $this->recalculatePricing();
    }

    public function getSubtotalPriceProperty(): int
    {
        return (int) $this->subtotal_price;
    }

    public function getTaxAmountProperty(): int
    {
        return (int) $this->tax_amount;
    }

    public function getTotalPriceProperty(): int
    {
        return (int) $this->total_price;
    }

    public function submitOrder()
    {
        $this->watch_at = $this->watch_at ?: '12:30';

        $this->validate([
            'movie_id' => 'required|exists:movies,id',
            'watch_at' => 'required|date_format:H:i',
            'seat' => 'required|string|max:10',
            'ticket' => 'required|integer|min:1',
            'proof_of_payment' => 'nullable|image|max:2048',
        ]);

        $movie = Movie::findOrFail($this->movie_id);
        $this->movie_name = $movie->title;
        $this->movie_price = (float) ($movie->price ?? 35000);



        $proofPath = null;
        if ($this->proof_of_payment) {
            $proofPath = $this->proof_of_payment->store('proofs', 'public');
        }

        OrderModel::create([
            'user_id' => Auth::id(),
            'movie_id' => $movie->id,
            'movie_name' => $movie->title,
            'watch_at' => date('H:i:s', strtotime($this->watch_at)),
            'seat' => $this->seat,
            'ticket' => $this->ticket,
            'price' => $this->total_price,
            'proof_of_payment' => $proofPath,
        ]);

        session()->flash('message', 'Pesanan tiket berhasil dibuat!');

        return redirect()->route('history');
    }

    public function render()
    {
        return view('livewire.components.Order')->layout('layouts.app');
    }
}
