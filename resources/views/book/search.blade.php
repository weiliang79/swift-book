@extends('layouts.app')
@section('content')
<div class="container">
      <div class="row row-cols-3">
            @foreach($books as $book)
            <div class="col-md-4">
                  <div class="card mb-4 box-shadow">
                        <img class="card-img-top" alt="" src="{{ $book->image_path }}" style="height: 225px; width: 100%; display: block;">
                        <div class="card-body">
                              <p class="card-text">{{ $book->name }}</p>
                              <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                          <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                          <button type="button" class="btn btn-sm btn-outline-secondary">Add to cart</button>
                                    </div>
                                    <a href="">
                                          <span class="material-symbols-outlined">reviews</span>
                                    </a>
                              </div>
                        </div>
                  </div>
            </div>
            @endforeach
      </div>
</div>
@endsection