@extends('theme.default')

@section('heading')
{{ __('message.Add New Category') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">{{ __('message.Add New Category') }}</h4>
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
                <form id="categories-form" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">

                            <label class="bmd-label-floating" for="image">{{ __('message.Icon') }}</label>
                            <input  class="form-control" name="image" type="file" id="image">
                            <img id="blah" src="#" alt="..." class="img-thumbnail">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">{{ __('message.Category Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="sku">{{ __('message.SKU') }}</label>
                            <input type="text" class="form-control" id="sku" name="sku" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="parent_category">{{ __('message.Parent Category') }}</label>
                            <select id="parent_category" class="custom-select" name="cat_id" data-style="select-with-transition" title="parent_category" data-size="7">
                                    <option value="0">Parent Categories</option>
                                @if($categories->isEmpty())
                                @else
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-check mt-4">
                        <label class="form-check-label">
                            <input id="timed_event" name="timed_event" class="form-check-input" type="checkbox" onchange="handleEvent()"> {{ __('message.Active') }}
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    
                    <div id="timed_event_section">
                        <div class="row">
                            <div class="form-group col-md-6 mt-4">
                                <label class="bmd-label" for="timedEventFrom">{{ __('message.From') }}</label>
                                <input type="text" name="timedEventFrom" class="form-control datetimepicker mt-2" id="timedEventFrom">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 mt-4">  
                                <label class="bmd-label" for="timedEventTo">{{ __('message.To') }}</label>
                                <input type="text" name="timedEventTo" class="form-control datetimepicker mt-2" id="timedEventTo">
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="togglebutton">
                        <label>
                        <input id="is-active" name="active" type="checkbox" onchange="handleChange()">
                            <span class="toggle"></span><span id="status"></span>
                        </label>
                    </div>

                </form>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-fill btn-rose" form="categories-form">
                {{ __('message.Submit') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $(document).ready(function() {
        // initialise Datetimepicker and Sliders
        md.initFormExtendedDatetimepickers();
        if ($('.slider').length != 0) {
            md.initSliders();
        }


        if ($('input[name=active]:checked').length > 0) {
            $("#status").html("Active");
        } else {
            $("#status").html("Not active");
        }

        if ($('input[name=timed_event]:checked').length > 0) {
            $('#timed_event_section').slideDown();
        } else {
            $('#timed_event_section').slideUp();
        }

    });
    function handleChange() {
        
        if ($('input[name=active]:checked').length > 0) {
            $("#status").html("Active");
        } else {
            $("#status").html("Not active");
        }
    }
    function handleEvent() {
        if ($('input[name=timed_event]:checked').length > 0) {
            $('#timed_event_section').slideDown();
        } else {
            $('#timed_event_section').slideUp();
        }
    }
    
    /* function for perview image*/
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#image").change(function(){
        readURL(this);
    });
    /* function for perview image*/

</script>

@endsection