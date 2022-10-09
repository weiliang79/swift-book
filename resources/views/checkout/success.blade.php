@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 1000px">
        <div class="card">
            <div class="card-header">
                Payment
            </div>
            <div class="card-body">
                <div class="d-flex gap-4">
                    <div style="width: 7rem">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                    </div>
                    <div>
                        <h5 class="card-title">Payment Success!</h5>
                        <p class="card-text">
                            Your purchase is confirmed
                            <br>
                            Thank you for shopping with us!
                        </p>
                        <a href="/home" class="btn btn-primary">Go to catalog</a>
                        {{-- TODO: fix this link --}}
                        <a href="/home" class="btn btn-primary">Go to payment history</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
