@extends('layouts.app')

@section('content')

<div class="container py-4">
      <div class="row justify-content-center">
            <div class="col">
                  <div class="card">
                        <div class="card-header">
                              Orders
                        </div>

                        <div class="card-body">

                              <table class="dataTable table table-stripped">
                                    <thead>
                                          <tr>
                                                <th>User Name</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($orders as $order)
                                          <tr>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ $order->created_at->format('Y-m-d h:ia') }}</td>
                                                <td>
                                                      <a class="btn btn-primary" href="{{ route('admin.orders.detail', ['order_id' => $order->id]) }}">Detail</a>
                                                </td>
                                          </tr>
                                          @endforeach
                                    </tbody>
                              </table>

                        </div>
                  </div>
            </div>
      </div>
</div>

@endsection