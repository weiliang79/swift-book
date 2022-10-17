@extends('layouts.app')

@section('content')

    <main class="mx-5">
        <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0">Order History</h5>
            </div>

            <div class="card-body">
                @if($orders->count() === 0)
                    No Order
                @else
                    <div class="accordion" id="orderAccordion">

                        @foreach($orders as $key => $order)
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="false">
                                        <div class="d-flex justify-content-between mx-4" style="width: 100%">
                                            <p class="align-items-start mb-0">Order # {{ $order->created_at->format('Y-m-d h:ia') }}</p>
                                            <p class="align-items-end mb-0">{{ $order->status }}</p>
                                        </div>
                                    </button>
                                </div>

                                <div id="collapse{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#orderAccordion">

                                    <div class="container py-4">

                                        @if($order->status === 'fail')
                                            <div class="row">
                                                <div class="col">
                                                    <p class="text-center text-danger">Payment Failed, <a href="{{ route('checkout.pay', ['order' => $order->id]) }}">please pay again</a>.</p>
                                                </div>
                                            </div>
                                        @elseif($order->status === 'expired')
                                            <div class="row">
                                                <div class="col">
                                                    <p class="text-center text-danger">Payment Failed.</p>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="row">
                                            <div class="col">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Order Details
                                                    </div>

                                                    <div class="card-body">

                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>ISBN</th>
                                                                    <th>Quantity</th>
                                                                    <th>Price</th>
                                                                    @if($order->status !== 'fail' && $order->status !== 'expired') <th>Action</th> @endif
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($order->books()->withPivot('quantity')->get() as $book)
                                                                    <tr>
                                                                        <td>{{ $book->name }}</td>
                                                                        <td>{{ $book->isbn }}</td>
                                                                        <td>{{ $book->pivot->quantity }}</td>
                                                                        <td>{{ number_format($book->pivot->quantity * $book->price, 2) }}</td>
                                                                        @if($order->status !== 'fail' && $order->status !== 'expired')
                                                                        <td>
                                                                            <a href="{{ route('rating', ['book_id' => $book->id]) }}" class="btn btn-primary">Review</a>
                                                                        </td>
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                @endif
            </div>
        </div>
    </main>

@endsection
