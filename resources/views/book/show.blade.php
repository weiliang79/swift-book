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
                               
                                <form>
                                    <select class="form-select form-select-lg mb-3 "  name="quantity" id="">
                                        @for($i = 1; $i <= $book->quantity; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        
                                    </select>
        
                                    <button type="button" class="btn btn-primary btn-lg col-12">add to cart </button>
                                </form>
                            </li>
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
