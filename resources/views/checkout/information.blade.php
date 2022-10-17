@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1000px">
    <div class="row" style="font-family: 'Segoe UI'; font-size: 1rem">
        <div class="col-lg-7">
            <h4 class="mb-3">Shipping address</h4>
            @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
            <form class="needs-validation" method="post" action="{{ route('checkout.store', ['order' => $order->id]) }}">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="firstName">First name</label>
                        <input class="form-control {{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" type="text" value="{{ old('firstName') }}" required>
                        @error('firstName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="lastName">Last name</label>
                        <input class="form-control {{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" type="text" value="{{ old('lastName') }}" required>
                        @error('lastName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="address">Address</label>
                        <input class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" type="text" placeholder="117 Lebuh Relau 9, Sungai Ara" value="{{ old('address') }}" required>
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="address2">Building</label>
                        <input class="form-control {{ $errors->has('address2') ? ' is-invalid' : '' }}" name="address2" type="text" placeholder="Apartment, Condominium, etc">
                        @error('address2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <label class="form-label" for="state">State</label>
                        <select class="form-select" name="state" required>
                            <option value="">Choose...</option>
                            <option value="johor">Johor</option>
                            <option value="kedah">Kedah</option>
                            <option value="kelantan">Kelantan</option>
                            <option value="melaka">Melaka</option>
                            <option value="negeri_sembilan">Negeri Sembilan</option>
                            <option value="pahang">Pahang</option>
                            <option value="perak">Perak</option>
                            <option value="perlis">Perlis</option>
                            <option value="pulau_pinang">Pulau Pinang</option>tow
                            <option value="sabah">Sabah</option>
                            <option value="sarawak">Sarawak</option>
                            <option value="selangor">Selangor</option>
                            <option value="terengganu">Terengganu</option>
                            <option value="kuala_lumpur">W.P. Kuala Lumpur</option>
                            <option value="labuan">W.P. Labuan</option>
                            <option value="putrajaya">W.P. Putrajaya</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="town">Town</label>
                        <input class="form-control {{ $errors->has('town') ? ' is-invalid' : '' }}" name="town" type="text" placeholder="Georgetown" value="{{ old('town') }}" required>
                        @error('town')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="postcode">Postcode</label>
                        <input class="form-control {{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" type="number" placeholder="11900" value="{{ old('postcode') }}" required>
                        @error('postcode')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="phoneNumber">Phone number</label>
                        <input class="form-control {{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}" name="phoneNumber" type="tel" value="{{ old('phoneNumber') }}" required>
                        @error('phoneNumber')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                    <hr class="my-4">
                    <div class="form-check">
                        <input class="form-check-input" name="rememberAddress" type="checkbox">
                        <label class="form-check-label" for="rememberAddress">Save this address for later</label>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-5">
            @foreach ($carts as $cart)
            <div class="d-flex my-2 mb-3 justify-content-between align-items-center">
                <div style="width: 4.6rem; height: 4.6rem;">
                    <img class="w-100 h-100" src="{{ asset('storage/' . $cart->book->image_path) }}" style="object-fit: contain; border: 1px rgb(190, 190, 190) solid; border-radius: 5px">
                </div>
                <h6 style="width: 11rem">{{ $cart->book->name }}</h6>
                <p>{{ $cart->quantity }}x</p>
                <p>RM{{ $cart->book->price }}</p>
            </div>
            @endforeach
            <hr class="my-4">
            <p class="d-flex justify-content-between">Subtotal (3 books)
                <span>RM {{ number_format($summary[0], 2, '.', '') }}</span>
            </p>
            <p class="d-flex justify-content-between">Shipping Fee
                <span>RM {{ number_format($summary[1], 2, '.', '') }}</span>
            </p>
            <hr>
            <strong class="d-flex justify-content-between">Total
                <span>RM {{ number_format($summary[2], 2, '.', '') }}</span>
            </strong>
        </div>
    </div>
</div>
@endsection