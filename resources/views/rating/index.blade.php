@extends('layouts.app')

@section('content')

<main class="mx-5">
      <div class="card">
            <div class="card-header py-3">
                  <h5 class="mb-0">Rating</h5>
            </div>

            <div class="card-body">

                  <div class="container">
                        <div class="row">
                              <div class="col-6">
                                    <div class="d-flex justify-content-center mb-4">
                                          <img src="{{ asset('storage/' . $book->image_path) }}" alt="{{ $book->name }}" style="width: 40%;">
                                    </div>

                                    <ul class="list-group">
                                          <li class="list-group-item d-flex justify-content-between">
                                                <p>Book Name</p>
                                                <p>{{ $book->name }}</p>
                                          </li>

                                          <li class="list-group-item d-flex justify-content-between">
                                                <p>ISBN</p>
                                                <p>{{ $book->isbn }}</p>
                                          </li>

                                          <li class="list-group-item d-flex justify-content-between">
                                                <p>Book Price</p>
                                                <p>{{ $book->price }}</p>
                                          </li>
                                    </ul>
                              </div>

                              <div class="col-6">

                                    <form action="{{ route('rating.store', ['book_id' => $book->id]) }}" method="POST">
                                          @csrf

                                          @if($errors->any())
                                          <div class="row my-4">
                                                <div class="col-md-8 offset-md-3 text-danger">
                                                      {!! implode('', $errors->all('<div>:message</div>')) !!}
                                                </div>
                                          </div>
                                          @endif

                                          <div class="d-flex flex-column justify-content-start">

                                                <div class="d-inline-flex mb-2">
                                                      <div class="rating">
                                                            <input id="star5" name="star" type="radio" value="5" class="radio-btn hide" />
                                                            <label for="star5">☆</label>
                                                            <input id="star4" name="star" type="radio" value="4" class="radio-btn hide" />
                                                            <label for="star4">☆</label>
                                                            <input id="star3" name="star" type="radio" value="3" class="radio-btn hide" />
                                                            <label for="star3">☆</label>
                                                            <input id="star2" name="star" type="radio" value="2" class="radio-btn hide" />
                                                            <label for="star2">☆</label>
                                                            <input id="star1" name="star" type="radio" value="1" class="radio-btn hide" />
                                                            <label for="star1">☆</label>
                                                            <div class="clear"></div>
                                                      </div>
                                                </div>

                                                <textarea class="form-control mb-4" name="comment" id="" cols="30" rows="10" placeholder="Comment"></textarea>

                                                <button type="submit" class="btn btn-primary">Submit</button>

                                          </div>

                                    </form>

                              </div>
                        </div>
                  </div>

            </div>
      </div>
</main>

@endsection