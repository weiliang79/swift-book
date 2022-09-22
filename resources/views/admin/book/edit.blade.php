@extends('layouts.app')

@section('content')

<div class="container py-4">
      <div class="row justify-content-center">
            <div class="col">
                  <div class="card">
                        <div class="card-header">
                              {{ Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'admin.books.create') ? 'New Book Info' : 'Edit Book Info' }}
                        </div>

                        <div class="card-body">

                              @if($errors->any())
                              <div class="row my-4">
                                    <div class="col-md-8 offset-md-3 text-danger">
                                          The form has some error, please refill and submit again.
                                    </div>
                              </div>
                              @endif

                              <form action="{{ Illuminate\Support\Str::startsWith(Route::currentRouteName(), 'admin.books.create') ? route('admin.books.save') : route('admin.books.update', ['book_id' => $book->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                          <label for="" class="col-md-3 col-form-label text-md-end">Book Name</label>

                                          <div class="col-md-8">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" placeholder="Book Name" value="{{ old('name', isset($book) ? $book->name : '') }}">

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                          </div>


                                    </div>

                                    <div class="row mb-3">
                                          <label for="" class="col-md-3 col-form-label text-md-end">ISBN</label>

                                          <div class="col-md-8">
                                                <input type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" id="" placeholder="ISBN" value="{{ old('isbn', isset($book) ? $book->isbn : '') }}">

                                                @error('isbn')
                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                          </div>
                                    </div>

                                    <div class="row mb-3">
                                          <label for="" class="col-md-3 col-form-label text-md-end">Price</label>

                                          <div class="col-md-8">
                                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="" placeholder="Price" value="{{ old('price', isset($book) ? $book->price : '') }}">

                                                @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                          </div>
                                    </div>

                                    <div class="row mb-3">
                                          <label for="" class="col-md-3 col-form-label text-md-end">Quantity</label>

                                          <div class="col-md-8">
                                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="" placeholder="Quantity" value="{{ old('quantity', isset($book) ? $book->quantity : '') }}">

                                                @error('quantity')
                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                          </div>
                                    </div>

                                    <div class="row mb-3">
                                          <label for="" class="col-md-3 col-form-label text-md-end">Book Image</label>

                                          <div class="col-md-8">
                                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="" value="{{ old('image') }}">

                                                @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                          </div>
                                    </div>

                                    @if(isset($book))
                                          @if($book->image_path)
                                          <div class="row mb-3">
                                                <div class="col-md-3">

                                                </div>
                                                <div class="col-md-8">
                                                      <img src="{{ asset('storage/' . $book->image_path) }}" alt="" style="width: 100%;">
                                                </div>
                                          </div>
                                          @endif
                                    @endif

                                    <div class="row mb-0">
                                          <div class="col-md-8 offset-md-3">
                                                <button type="submit" class="btn btn-primary">
                                                      {{ __('Submit') }}
                                                </button>
                                          </div>
                                    </div>

                              </form>

                        </div>
                  </div>
            </div>
      </div>
</div>

@endsection