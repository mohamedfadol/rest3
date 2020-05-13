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
Add a Payment
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">power</i>
                </div>
                <h4 class="card-title">Add a Modifire</h4>
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
                <form method="POST" action="{{ route('payment.update' , $payment->id)}}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">Arabic Name</label>
                            <input type="text" 
                                        class="form-control" 
                                            id="name" 
                                                name="name"
                                                    value="{{$payment->name}}"
                                                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameEn">English Name</label>
                            <input type="text" 
                                        class="form-control" 
                                            id="nameEn" 
                                                name="nameEn"
                                                    value="{{$payment->nameEn}}"
                                                        >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note">Note</label>
                            <input type="text" 
                                        class="form-control" 
                                            id="note" 
                                                name="note"
                                                    value="{{$payment->note}}"
                                                        >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2 ">
                            <label class="form-check-label" for="value">Value</label>
                            <input type="checkbox" 
                                        {{ $payment->value == 1 ? 'checked' : '' }} 
                                            id="value" 
                                                name="value"
                                                    value="{{$payment->value}}"
                                                        >
                                        
                            <label class="form-check-label" for="type">Type</label>
                            <input type="checkbox" 
                                        {{ $payment->type == 1 ? 'checked' : '' }}
                                                id="type" 
                                                    name="type"
                                                        value="{{$payment->type}}"
                                                            >
                            <label class="form-check-label" for="default">Default</label>
                            <input type="checkbox" 
                                        {{ $payment->default == 1 ? 'checked' : '' }}
                                            id="default" 
                                                name="default"
                                                    value="{{$payment->default}}"
                                                        >
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

@section('script')

@stop