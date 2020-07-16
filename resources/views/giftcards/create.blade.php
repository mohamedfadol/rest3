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
{{ __('message.Add New Gift Card') }}
@endsection

@section('content') 
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">card_giftcard</i>
                </div>
                <h4 class="card-title">{{ __('message.Add New Gift Card') }}</h4>
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
                <form method="Post" action="{{ route('giftcard.store') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">{{ __('message.GiftCards Name') }}</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <label class="col-sm-2 col-form-label label-checkbox">{{ __('message.GiftCards Type') }}</label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="type" value="percent" checked> Percent
                                        <span class="circle">
                                    <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="type" value="fixed"> Fixed
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="amount">{{ __('message.GiftCards Amount') }}</label>
                            <input type="text" name="amount" class="form-control" id="amount">
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="ValidFrom" class="col-form-label col-md-4">{{ __('message.GiftCards Valid From') }}</label>
                                <input type="text" name="ValidFrom" class="form-control datepicker col-md-4">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="validTo" class="col-form-label col-md-4">{{ __('message.GiftCards Valid To') }}</label>
                                <input type="text" name="validTo" class="form-control datepicker col-md-4">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="couponNumber">{{ __('message.GiftCards Number of Coupons') }}</label>
                            <input type="number" name="couponNumber" class="form-control" id="couponNumber">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <label class="col-sm-2 col-form-label label-checkbox">{{ __('message.GiftCards Valid On') }}</label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                            type="checkbox" name="validOn" 
                                                value="monday"> {{ __('message.Monday') }}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                                type="checkbox" name="validOn" 
                                                    value="tuesday"> {{ __('message.Tuesday') }}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                            type="checkbox" name="validOn" 
                                                value="wednesday"> {{ __('message.Wednesday') }}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                            type="checkbox" name="validOn" 
                                                    value="thursday"> {{ __('message.Thursday') }}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                            type="checkbox" name="validOn" 
                                                value="friday"> {{ __('message.Friday') }}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                            type="checkbox" name="validOn" 
                                                value="saturday"> {{ __('message.Saturday') }}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                            type="checkbox" name="validOn" 
                                                value="sunday"> {{ __('message.Sunday') }}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-fill btn-rose">{{ __('message.Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection