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
{{ __('message.Edit Modifire') }} 
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">power</i>
                </div>
                <h4 class="card-title">{{ __('message.Edit Modifire') }}</h4>
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
                <form method="POST" action="{{ route('modifire.update' , $modifire->id)}}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameAr">{{ __('message.modifire Arabic Name') }}</label>
                            <input value="{{$modifire->nameAr}}" type="text" class="form-control" id="nameAr" name="nameAr">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameEn">{{ __('message.modifire English Name') }}</label>
                            <input value="{{$modifire->nameEn}}" type="text" class="form-control" id="nameEn" name="nameEn">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="sku">{{ __('message.SKU') }}</label>
                            <input value="{{$modifire->sku}}" type="text" class="form-control" id="sku" name="sku">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="cost">{{ __('message.Cost') }}</label>
                            <input value="{{$modifire->cost}}" type="number" class="form-control" id="cost" name="cost">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="tax">{{ __('message.Tax') }}</label>
                            <input value="{{$modifire->tax}}" type="number" class="form-control" id="tax" name="tax">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="price">{{ __('message.Price') }}</label>
                            <input value="{{$modifire->price}}" type="number" class="form-control" id="price" name="price">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <label class="col-sm-2 col-form-label label-checkbox">{{ __('message.Unit') }}</label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input 
                                    class="form-check-input" 
                                        onchange="handleWeight()" 
                                            type="radio" 
                                                name="unit" 
                                                    value="Kg" 
                                    {{$modifire->unit == 'Kg' ? 'checked' : ''}}> Kg
                                        <span class="circle">
                                    <span class="check"></span>
                                    </span>
                                </label>
                            </div> 
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input 
                                        class="form-check-input" 
                                            onchange="handleWeight()" 
                                                type="radio" 
                                                    name="unit" 
                                                        value="Pices"
                                    {{$modifire->unit == 'Pices' ? 'checked' : ''}}> Pices
                                    <span class="circle">
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

@section('script')
    @parent
    <script src="{!! asset('js/mapInput.js') !!}"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{!! asset('theme/js/plugins/bootstrap-datetimepicker.min.js') !!}"></script>

    <script>
    $(document).ready(function() {
      // initialise Datetimepicker and Sliders
      md.initFormExtendedDatetimepickers();
      if ($('.slider').length != 0) {
        md.initSliders();
      }
    });

    function handleWeight()
    {
        if ($('input[name=unit]:checked').val() == 'Pices') {
            $('#weight_value').slideDown();
            $('#weight_value').attr('required','required');
        } else {
            $('#weight_value').slideUp();
            $('#weight_value').removeAttr('required'); 
        }
    }    
    </script>
@stop