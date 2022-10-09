@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 1000px">
        <div class="card">
            <div class="card-header">
                Payment
            </div>
            <div class="card-body">
                <div class="d-flex gap-4">
                    <div class="d-flex" style="width: 7rem;">
                        <svg class="mx-auto" width="5rem" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg>                    </div>
                    <div>
                        <h5 class="card-title">Payment Failed!</h5>
                        <p class="card-text">
                            Your purchase has been declined
                            <br>
                            Please follow the link below to try again
                        </p>
                        {{-- TODO: fix this link --}}
                        <a href="/home" class="btn btn-primary">Go to payment history</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
