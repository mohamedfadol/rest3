@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">    
            <div class="card login">
                
                    <div class="card-header">{{ __('Registration Form') }}</div>
                                        
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="firstName" class="">{{ __('First Name') }}</label>
                                    <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required  autofocus>
                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="LastName" class="">{{ __('Last Name') }}</label>
                                    <input id="LastName" type="text" class="form-control @error('LastName') is-invalid @enderror" name="LastName" value="{{ old('LastName') }}" required  >
                                @error('LastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="businessName" class="">{{ __('Business Name') }}</label>
                                    <input id="businessName" type="text" class="form-control @error('businessName') is-invalid @enderror" name="businessName" value="{{ old('businessName') }}" required  >
                            @error('businessName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="branch_number" class="">{{ __('Branch Number') }}</label>
                                    <input id="branch_number" type="text" class="form-control @error('branch_number') is-invalid @enderror" name="branch_number" value="{{ old('branch_number') }}" required  >
                                @error('branch_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="user_number" class=" ">{{ __('Number Of Users') }}</label>
                                    <input id="user_number" type="text" class="form-control @error('user_number') is-invalid @enderror" name="user_number" value="{{ old('user_number') }}" required  >
                                @error('user_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="phone" class="">{{ __('Phone Number') }}</label>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required  >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 ">
                                <label for="country" class="">{{ __('Country') }}</label>
                                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required >
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 ">
                                <label for="state" class="">{{ __('State') }}</label>
                                    <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required >
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 ">
                                <label for="city" class="">{{ __('City') }}</label>
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required >
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 ">
                            <label for="name" class="">{{ __('User Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 ">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 ">
                            <label for="password" class="">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                        </div>

                        <div class="form-row ">
                            <div class="col-md-4 ">
                                <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required >
                            </div>
                            <div class="col-md-4 mt-5">
                                <label for="subscrib" class="">{{ __('Subscrib') }}</label>
                                    <input id="subscrib" type="checkbox"  name="subscrib" value="1">
                            </div>
                            <div class="col-md-4 mt-5">
                                <label for="agree" class="">{{ __('Agree') }}</label>
                                    <input id="agree" type="checkbox" name="agree" value="1">
                            </div> 
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Registration') }}</button>

                    </form>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
