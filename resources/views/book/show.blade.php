@extends('layouts.app')

@section('content')
    <main class="mx-5">
        <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0">Book detail</h5>
            </div>

            <div class="card-body">

                <div class="container">
                    <div class="row">
                        <div class="col-6"  >
                            <div class="d-flex justify-content-center mb-5">
                                <img src="{{ asset('storage/' . $book->image_path) }}" alt="{{ $book->name }}"
                                    style="width: 60%; ">
                            </div>
                        </div>

                        <ul class="col-6 list-group d-flex justtify-content-center">
                            <li class="list-group-item d-flex flex-column" >
                                <p class="fs-2 mb-5" >{{ $book->name }}</p>
                                <p class="fs-5 mb-5">ISBN: {{ $book->isbn }}</p>
                                <p class="fs-5 mb-5">RM {{ $book->price }}</p>
                               
                                
                                <button id="addToCartBtn" type="button" class="btn btn-primary btn-lg col-12" onclick="addToCartClicked()" {{ auth()->user()->carts()->where('book_id', $book->id)->count() !== 0 ? 'disabled' : '' }}>Add to Cart</button>
                            </li>
                          
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    Ratings
                                </div>

                                <div class="card-body">
                                    @if($book->ratings()->count() == 0)
                                        <div class="d-flex justify-content-center">
                                            No Review Available
                                        </div>
                                    @else
                                        <ul class="list-group">
                                            @foreach ($book->ratings as $rating)
                                                <li class="list-group-item">
                                                    <h6>{{ $rating->user->name }}</h6>
                                                    <div class="d-flex">
                                                        <span class="{{ $rating->rating >= 1 ? 'star-color' : '' }}">&#9733;</span>
                                                        <span class="{{ $rating->rating >= 2 ? 'star-color' : '' }}">&#9733;</span>
                                                        <span class="{{ $rating->rating >= 3 ? 'star-color' : '' }}">&#9733;</span>
                                                        <span class="{{ $rating->rating >= 4 ? 'star-color' : '' }}">&#9733;</span>
                                                        <span class="{{ $rating->rating >= 5 ? 'star-color' : '' }}">&#9733;</span>
                                                    </div>
                                                    <p>{{ $rating->comment }}</p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script>
        function addToCartClicked(){
            axios.post('{{ route("cart.add", ["book_id" => $book->id]) }}')
            .then(response => {
                alert('Book successful add to cart with ' + response.data.cart.quantity + ' Quantity.');
                document.getElementById('addToCartBtn').disabled = true;
            }).catch(error => {
                console.log(error);
                //TODO: change error message
                alert("Error during add to cart.");
            });
        }
    </script>
@endsection
