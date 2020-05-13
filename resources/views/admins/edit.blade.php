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
Edit  <strong class="text-info">{{$branch->name}}</strong>  Branch 
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">Edit  <strong class="text-info">{{$branch->name}}</strong>  Branch </h4>
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
                <form method="POST" action="{{ route('admin.branch.update' , $branch->id)}}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">Branch name</label>
                            <input 
                                type="text" 
                                    name="name" 
                                        class="form-control" 
                                            id="name"
                                                value="{{$branch->name}}" 
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