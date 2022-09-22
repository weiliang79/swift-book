@extends('layouts.app')

@section('content')

<div class="container py-4">
      <div class="row justify-content-center">
            <div class="col">
                  <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                              Book Management
                              <a class="btn btn-primary" href="{{ route('admin.books.create') }}">Add Book</a>
                        </div>

                        <div class="card-body">

                              <table class="dataTable table table-stripped" style="width: 100%;">
                                    <thead>
                                          <tr>
                                                <th>Name</th>
                                                <th>ISBN</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach ($books as $book)
                                          <tr>
                                                <td>{{ $book->name }}</td>
                                                <td>{{ $book->isbn }}</td>
                                                <td>{{ $book->price }}</td>
                                                <td>{{ $book->quantity }}</td>
                                                <td>
                                                      <a class="btn btn-primary" href="{{ route('admin.books.edit', ['book_id' => $book->id]) }}">Edit</a>
                                                      <button type="button" class="btn btn-danger" onclick="promptDeleteWarning(this)" data-id="{{ $book->id }}">Delete</button>
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

<script>
      function promptDeleteWarning(item){
            if(confirm('Delete this book info?')){
                  
                  $.ajaxSetup({
                        headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        }
                  });

                  $.ajax({
                        url: '{{ route("admin.books.delete") }}',
                        method: 'POST',
                        dataType: 'json',
                        data: {
                              book_id: $(item).data('id'),
                        },
                        success: function (result) {
                              alert(result);
                              window.location.reload();
                        }, 
                        error: function (error) {
                              console.log(error);
                        },
                  });

            }
      }
</script>

@endsection