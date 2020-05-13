@extends('theme.default')

@section('head')
    <style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
    
    input[type=number] {
        -moz-appearance:textfield; /* Firefox */
    }
    </style>
@endsection

@section('heading')
Update a Customer
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title">Update a Customer</h4>
            </div>
            <div class="card-body ">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger py-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form method="POST" action="{{ route('customer.update' , $customer->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">Name</label>
                            <input 
                                type="text" 
                                    class="form-control" 
                                        id="name" 
                                            name="name" value="{{$customer->name}}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nationality">Nationality</label>
                            <input class="form-control" 
                                            id="nationality" 
                                                name="nationality" 
                                                    value="{{$customer->nationality}}" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="email">E-mail</label>
                            <input class="form-control" 
                                            id="email" 
                                                name="email" 
                                                    value="{{$customer->email}}" 
                                                        required />
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="phone">Phone</label>
                            <input class="form-control" 
                                            id="phone" 
                                                name="phone" 
                                                    value="{{$customer->phone}}" 
                                                        required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="country">Country</label>
                            <input class="form-control" 
                                            id="country" 
                                                name="country" 
                                                    value="{{$customer->country}}"  
                                                        required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="state">State</label>
                            <input class="form-control" 
                                            id="state" 
                                                name="state" 
                                                    value="{{$customer->state}}"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="city">City</label>
                            <input class="form-control" 
                                            id="city" 
                                                name="city" 
                                                    value="{{$customer->city}}"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="area">Area</label>
                            <input class="form-control" 
                                            id="area" 
                                                name="area" 
                                                    value="{{$customer->area}}"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="street">Street</label>
                            <input class="form-control" 
                                            id="street" 
                                                name="street" 
                                                    value="{{$customer->street}}"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="creditCard">Credit-Card</label>
                            <input class="form-control" 
                                            id="creditCard" 
                                                name="creditCard" 
                                                    value="{{$customer->creditCard}}"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="discount">Discount</label>
                            <input class="form-control" 
                                            id="discount" 
                                                name="discount" 
                                                    value="{{$customer->discount}}"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note">Note</label>
                            <input class="form-control" 
                                            id="note" 
                                                name="note" 
                                                    value="{{$customer->note}}"  
                                                        required />
                        </div>
                    </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                                <button type="submit" class="btn btn-fill btn-rose">Submit and new</button>
                            </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
