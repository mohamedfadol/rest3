@extends('layouts.adminApp')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">    
            <div class="card login">
                
                    <div class="card-header">{{ __('Admin Registeration Form') }}</div>
                                        
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.register.submit') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="name" class="">{{ __('User Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="password" class="">{{ __('Password') }}</label>
                                    <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required  >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="text" class="form-control @error('password-confirm') is-invalid @enderror" name="password-confirm" value="{{ old('password-confirm') }}" required  >
                            @error('password-confirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Registration') }}</button>

                    </form>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
