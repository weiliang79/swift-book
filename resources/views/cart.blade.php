@extends('layouts.app')

@section('content')
    <main class="mx-5">
        <section class="d-flex">
            {{-- left card --}}
            <div class="card flex-grow-1">
                <div class="card-header py-3">
                    <h5 class="mb-0">Cart</h5>
                </div>
                <div class="card-body d-flex flex-column gap-4">
                    @if ($carts->isEmpty())
                        <div class="m-auto">
                            <h3>Cart is empty 🛒🛒🛒</h3>
                        </div>
                    @endif
                    @foreach ($carts as $cart)
                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="d-flex align-items-center">
                                <img class="rounded-2" style="height: 100px; width: 100px; object-fit:scale-down"
                                    src="{{ asset('storage/' . $cart->book->image_path) }}" alt="Cover picture of book">
                                <div style="width: 1rem"></div>
                                <h4 style="width: 22rem">{{ $cart->book->name }}</h4>
                            </div>
                            <div class="d-flex align-items-center" data-bookid="{{ $cart->book->id }}">
                                <h5 class="mb-0">RM {{ $cart->book->price }}</h5>

                                <div style="width: 2rem"></div>
                                <button style="width: 2rem; height: 2rem; border: none;"
                                    onclick="decrement(this, '{{ url('/') }}')">-</button>
                                <p type="text" class="text-center" style="width: 3rem;margin: auto">
                                    {{ $cart->quantity }}
                                </p>
                                <button style="width: 2rem; height: 2rem; border: none;"
                                    onclick="increment(this, '{{ url('/') }}')">+</button>

                                <div style="width: 2rem"></div>

                                {{-- delete btn --}}
                                <a style="background: none; border: none; padding: 0"
                                    href="{{ url("/cart/delete/{$cart->book->id}") }}">
                                    <?xml version="1.0" encoding="UTF-8"?><svg width="24" height="24"
                                        viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 10V44H39V10H9Z" fill="none" stroke="#333" stroke-width="4"
                                            stroke-linejoin="round" />
                                        <path d="M20 20V33" stroke="#333" stroke-width="4" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M28 20V33" stroke="#333" stroke-width="4" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M4 10H44" stroke="#333" stroke-width="4" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M16 10L19.289 4H28.7771L32 10H16Z" fill="none" stroke="#333"
                                            stroke-width="4" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- spacing --}}
            <div style="margin-left: 1.7rem"></div>

            {{-- right card --}}
            <div>
                <div class="card" style="width: 25rem; align-self: flex-start">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body fs-5" id="summary-body">
                        <p class="d-flex justify-content-between">Subtotal ({{ $summary[3] }} books)
                            <span>RM {{ number_format($summary[0], 2, '.', '') }}</span>
                        </p>
                        <p class="d-flex justify-content-between">Shipping Fee
                            <span>RM {{ number_format($summary[1], 2, '.', '') }}</span>
                        </p>
                        <hr>
                        <strong class="d-flex justify-content-between">Total
                            <span>RM {{ number_format($summary[2], 2, '.', '') }}</span>
                        </strong>

                    </div>
                </div>
                <div class="mt-4">
                    @if (!$carts->isEmpty())
                        <a class="w-100 btn btn-primary btn-lg" href="{{ url('/checkout') }}">Checkout</a>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection
