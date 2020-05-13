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
Add a Category
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">Add a Category</h4>
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
                <form 
                    id="categories-form" 
                        method="POST" 
                            action="{{ route('category.update' ,$category->id ) }}" 
                                enctype="multipart/form-data">
                    @csrf 
                    {{ method_field('PUT') }}
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="image">Icon</label>
                            <input value="{{ $category->image}}" 
                                id="image" 
                                    class="form-control" 
                                        name="image" 
                                            type="file">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">Category Name</label>
                            <input value="{{ $category->name}}" 
                                id="name" 
                                    type="text" 
                                        class="form-control" 
                                            name="name" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="sku">SKU</label>
                            <input value="{{ $category->sku}}" 
                                type="number" class="form-control" 
                                    id="sku" 
                                        name="sku">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="parent_category">Parent Category</label>
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
                            <input id="timed_event" name="timed_event" class="form-check-input" type="checkbox" onchange="handleEvent()"> Timed Event
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    
                    <div id="timed_event_section">
                        <div class="row">
                            <div class="form-group col-md-6 mt-4">
                                <label class="bmd-label" for="timedEventFrom">From</label>
                                <input type="text" 
                                    value="{{ $category->timedEventFrom}}"  
                                        name="timedEventFrom" 
                                            class="form-control datetimepicker mt-2" 
                                                id="timedEventFrom">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 mt-4">  
                                <label class="bmd-label" for="timedEventTo">To</label>
                                <input type="text" 
                                    value="{{ $category->timedEventTo}}" 
                                        name="timedEventTo" 
                                            class="form-control datetimepicker mt-2" 
                                                id="timedEventTo">
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="togglebutton">
                        <label>
                        <input 
                            {{ $category->active == 1 ? 'checked' : ''}} 
                                    id="is-active" name="active" 
                                        type="checkbox"    
                                            onchange="handleChange()">
                            <span class="toggle"></span><span id="status"></span>
                        </label>
                    </div>

                </form>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-fill btn-rose" form="categories-form">Submit</button>
                <button type="submit" class="btn btn-fill btn-rose">Submit and new</button>
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
</script>

@endsection