@extends('layouts.app')

@section('content')
<div class="container py-4">
      <div class="row justify-content-center">
            <div class="col">
                  <div class="card">
                        <div class="card-header">
                              Order Details
                        </div>

                        <div class="card-body">
                              <div class="row mb-4">
                                    <div class="col-6">
                                          User Information
                                          <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between">
                                                      <p class="mb-0">Name</p>
                                                      <p class="mb-0">{{ $order->user->name }}</p>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                      <p class="mb-0">Username</p>
                                                      <p class="mb-0">{{ $order->user->username }}</p>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                      <p class="mb-0">Email</p>
                                                      <p class="mb-0">{{ $order->user->email }}</p>
                                                </li>
                                          </ul>
                                    </div>

                                    <div class="col-6">
                                          Shipping Information
                                          <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between">
                                                      <p class="mb-0">Name</p>
                                                      <p class="mb-0">{{ $order->info->lastName }} {{ $order->info->firstName }}</p>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                      <p class="mb-0">Address</p>
                                                      <p class="mb-0">
                                                            {{ $order->info->address }}<br>
                                                            {{ $order->info->address2 }}<br>
                                                            {{ $order->info->state }}<br>
                                                            {{ $order->info->town }}<br>
                                                            {{ $order->info->postcode }}
                                                      </p>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                      <p class="mb-0">Phone</p>
                                                      <p class="mb-0">{{ $order->info->phoneNumber }}</p>
                                                </li>
                                          </ul>
                                    </div>
                              </div>

                              <div class="row mb-4">
                                    <div class="col">
                                          <div class="card">
                                                <div class="card-header">
                                                      Order Details
                                                </div>

                                                <div class="card-body">

                                                      <table class="dataTable table table-stripped">
                                                            <thead>
                                                                  <tr>
                                                                        <th>Book Name</th>
                                                                        <th>ISBN</th>
                                                                        <th>Quantity</th>
                                                                        <th>Price</th>
                                                                  </tr>
                                                            </thead>
                                                            <tbody>
                                                                  @foreach ($order->books()->withPivot(['quantity'])->get() as $book)
                                                                        <tr>
                                                                              <td>{{ $book->name }}</td>
                                                                              <td>{{ $book->isbn }}</td>
                                                                              <td>{{ $book->pivot->quantity }}</td>
                                                                              <td>{{ number_format($book->price * $book->pivot->quantity, 2) }}</td>
                                                                        </tr>
                                                                  @endforeach
                                                            </tbody>
                                                      </table>
                                                      
                                                </div>
                                          </div>
                                    </div>
                              </div>

                              <div class="row">
                                    <div class="col d-flex justify-content-center">
                                          <a class="btn btn-primary" href="{{ route('admin.orders') }}">Back</a>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection