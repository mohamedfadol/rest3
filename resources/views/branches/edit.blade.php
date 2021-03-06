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
{{ __('message.Edit a Branch') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">{{ __('message.Edit a Branch') }}</h4>
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
                <form method="POST" action="{{ route('branch.update' , $branch->id)}}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">{{ __('message.Branch Name') }}</label>
                            <input 
                                type="text" 
                                    name="name" 
                                        class="form-control" 
                                            id="name"
                                                value="{{$branch->name}}" 
                                                     
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="bmd-label-floating" for="address_address">{{ __('message.Address') }}</label>
                        <input 
                            type="text" 
                                id="address-input" 
                                    name="address_address" 
                                        class="form-control map-input"
                                            value="{{$branch->address_address}}"
                        >
<!--                         <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                        <input type="hidden" name="address_longitude" id="address-longitude" value="0" /> -->
                    </div>
<!--                     <div id="address-map-container" style="width:100%;height:400px; ">
                        <div style="width: 100%; height: 100%" id="address-map"></div>
                    </div> -->

                    <div>{{ __('message.Opening Time') }}:</div>

                    
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">{{ __('message.Monday') }}</div>
                                <label for="monday_from" class="col-form-label col-md-4">{{ __('message.From') }}</label>
                                <input 
                                    type="text"
                                        name="monday_from" 
                                            class="form-control timepicker col-md-4"
                                                value="{{$branch->monday_from}}" 
                                >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="monday_to" class="col-form-label col-md-4">{{ __('message.To') }}</label>
                                <input 
                                    type="text" 
                                        name="monday_to" 
                                            class="form-control timepicker col-md-4" 
                                                value="{{$branch->monday_to}}"  
                                >
                            </div>
                        </div>
                    </div>
                    
                    
                        
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">{{ __('message.Tuesday') }}</div>
                                <label for="tuesday_from" class="col-form-label col-md-4">{{ __('message.From') }}</label>
                                <input 
                                    type="text" 
                                        name="tuesday_from" 
                                            class="form-control timepicker col-md-4" 
                                                value="{{$branch->tuesday_from}}"
                                >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="tuesday_to" class="col-form-label col-md-4">{{ __('message.To') }}</label>
                                <input type="text" name="tuesday_to" class="form-control timepicker col-md-4" value="{{$branch->tuesday_to}}"
                                >
                            </div>
                        </div>
                    </div>
                    

                        
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">{{ __('message.Wednesday') }}</div>
                                <label for="wednesday_from" class="col-form-label col-md-4">{{ __('message.From') }}</label>
                                <input type="text" name="wednesday_from" class="form-control timepicker col-md-4" value="{{$branch->wednesday_from}}"
                                >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="wednesday_to" class="col-form-label col-md-4">{{ __('message.To') }}</label>
                                <input type="text" name="wednesday_to" class="form-control timepicker col-md-4" value="{{$branch->wednesday_to}}"
                                >
                            </div>
                        </div>
                    </div>
                    

                        
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">{{ __('message.Thursday') }}</div>
                                <label for="thursday_from" class="col-form-label col-md-4">{{ __('message.From') }}</label>
                                <input type="text" name="thursday_from" class="form-control timepicker col-md-4" value="{{$branch->thursday_from}}"
                                >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="thursday_to" class="col-form-label col-md-4">{{ __('message.To') }}</label>
                                <input type="text" name="thursday_to" class="form-control timepicker col-md-4" 
                                value="{{$branch->thursday_to}}"
                                >

                            </div>
                        </div>
                    </div>
                    

                        
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">{{ __('message.Friday') }}</div>
                                <label for="friday_from" class="col-form-label col-md-4">{{ __('message.From') }}</label>
                                <input type="text" name="friday_from" class="form-control timepicker col-md-4" value="{{$branch->friday_from}}" 
                                >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="friday_to" class="col-form-label col-md-4">{{ __('message.To') }}</label>
                                <input type="text" name="friday_to" class="form-control timepicker col-md-4" value="{{$branch->friday_to}}" >
                            </div>
                        </div>
                    </div>
                    

                        
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">{{ __('message.Saturday') }}</div>
                                <label for="saturday_from" class="col-form-label col-md-4">{{ __('message.From') }}</label>
                                <input type="text" name="saturday_from" class="form-control timepicker col-md-4" value="{{$branch->saturday_from}}">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="saturday_to" class="col-form-label col-md-4">{{ __('message.To') }}</label>
                                <input type="text" name="saturday_to" class="form-control timepicker col-md-4" value="{{$branch->saturday_to}}">
                            </div>
                        </div>
                    </div>
                    

                        
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3 pt-1 mt-2 pb-0">{{ __('message.Sunday') }}</div>
                                <label for="sunday_from" class="col-form-label col-md-4">{{ __('message.From') }}</label>
                                <input type="text" name="sunday_from" class="form-control timepicker col-md-4" value="{{$branch->sunday_from}}">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="sunday_to" class="col-form-label col-md-4">{{ __('message.To') }}</label>
                                <input type="text" name="sunday_to" class="form-control timepicker col-md-4" value="{{$branch->sunday_to}}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="phone">{{ __('message.Phone') }}</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="{{$branch->phone}}">
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label label-checkbox">{{ __('message.Delivery Price') }}</label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" onchange="handleDeliveryPrice()" 
                                        type="radio" 
                                            name="delivery_price" 
                                                value="dinamic" 
                                                    {{ $branch->delivery_price == 'dinamic'? 'checked':'' }}
                                                        > {{ __('message.Open') }}
                                        <span class="circle">
                                    <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" onchange="handleDeliveryPrice()" 
                                        type="radio" 
                                            name="delivery_price" 
                                                value="static"
                                                    {{ $branch->delivery_price == 'static'? 'checked':'' }}
                                                        > {{ __('message.Pre') }}
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <input 
                                type="text" 
                                    value="{{$branch->delivery_price}}" 
                                        class="form-control col-md-4" 
                                            id="static_delivery_price" 
                                                placeholder="Delivery Pre Price"
                                                    >
                        </div>
                    </div>

                   <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="phone">{{ __('message.Tax') }}</label>
                            <input 
                                type="number" 
                                    name="tax" 
                                        class="form-control" 
                                            id="tax" 
                                                value="{{$branch->tax}}"
                            >
                        </div>
                    </div>
                        <div class="card-footer ">
                            <button type="submit" class="btn btn-fill btn-rose">{{ __('message.Update') }}</button>
                        </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')
    @parent
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
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

      if ($('input[name=delivery_price]:checked').val() == 'static') {
            $('#static_delivery_price').slideDown();
            $('#static_delivery_price').attr('required','required');
        } else {
            $('#static_delivery_price').slideUp();
            $('#static_delivery_price').removeAttr('required'); 
        }
    });
    function handleDeliveryPrice()
    {
        if ($('input[name=delivery_price]:checked').val() == 'static') {
            $('#static_delivery_price').slideDown();
            $('#static_delivery_price').attr('required','required');
        } else {
            $('#static_delivery_price').slideUp();
            $('#static_delivery_price').removeAttr('required'); 
        }
    }
    </script>
@stop