@extends('layouts.app')

@section('content')
    <div class="w-25 mx-auto" style="font-family: 'Segoe UI'; font-size: 1rem">
        <form class="needs-validation" method="POST" action="{{ url("/checkout/pay/$order->id") }}">
            @csrf
            <div class="row gy-3">
                <div class="col-12">
                    <h3>Amount Payable: RM{{ number_format($summary[2], 2, '.', '') }}</h3>
                </div>
                <div class="col-12">
                    <label for="cc-name" class="form-label">Name on card</label>
                    <input type="text" class="form-control {{ $errors->has('cc_name') ? ' is-invalid' : '' }}"
                        name="cc_name" value="{{ old('cc_name') }}" required>
                    <small class="text-muted">Full name as displayed on card</small>
                    @error('cc_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="cc-number" class="form-label">Credit & Debit cards</label>
                    <img src="{{ url('/visa-mastercard.png') }}" style="height: 40px; display: block" alt="">
                </div>

                <div class="col-12">
                    <label for="cc-number" class="form-label">Credit card number</label>
                    <input type="text" class="form-control {{ $errors->has('cc_number') ? ' is-invalid' : '' }}"
                        name="cc_number" value="{{ old('cc_number') }}" required>
                    @error('cc_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="cc-expiration" class="form-label">Expiration</label>
                    <div class="d-flex gap-1">
                        <div class="col-md-5">
                            <input type="text"
                                class="form-control {{ $errors->has('cc_expiration_month') ? ' is-invalid' : '' }}"
                                name="cc_expiration_month" value="{{ old('cc_expiration_month') }}" placeholder="MM"
                                required>
                            @error('cc_expiration_month')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <input type="text"
                                class="form-control {{ $errors->has('cc_expiration_year') ? ' is-invalid' : '' }}"
                                name="cc_expiration_year" value="{{ old('cc_expiration_year') }}" placeholder="YYYY"
                                required>
                            @error('cc_expiration_year')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="cc-cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control {{ $errors->has('cc_cvv') ? ' is-invalid' : '' }}"
                        name="cc_cvv" value="{{ old('cc_cvv') }}" required>
                    @error('cc_cvv')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Submit payment</button>
                </div>

            </div>

        </form>
    </div>
@endsection
