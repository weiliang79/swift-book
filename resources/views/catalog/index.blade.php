@extends('layouts.app')

@section('content')

<div class="container">

    @auth()
      <div class="row">
            <div class="col">
                  <div class="d-flex justify-content-center">
                        <form action="{{ route('book.find') }}" method="get" style="width: 100%; max-width: 40rem">

                              <search-book></search-book>

                        </form>
                  </div>
            </div>
      </div>
    @endauth

      <div class="row row-cols-3">
            @foreach($books as $book)
            <div class="col-md-4">
                  <div class="card mb-4 box-shadow">
                        <img class="card-img-top" alt="" src="{{ asset('storage/' . $book->image_path) }}" style="height: 225px; width: 100%; display: block;">
                        <div class="card-body">
                              <p class="card-text">{{ $book->name }}</p>
                              <div class="d-flex justify-content-between align-items-center">
                                    @auth()
                                    <div class="btn-group">
                                          <a class="btn btn-sm btn-outline-secondary" href ="{{ url("/book/{$book->id}") }}">View</a>
                                          <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addToCartClicked('{{ route('cart.add', ['book_id' => $book->id]) }}')" {{ auth()->user()->carts()->where('book_id', $book->id)->count() !== 0 ? 'disabled' : '' }}>Add to cart</button>
                                    </div>
                                  @endauth
                              </div>
                        </div>
                  </div>
            </div>
            @endforeach

      </div>
</div>
@endsection
