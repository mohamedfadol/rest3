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

    .dropdown.bootstrap-select.show-tick {
        width: 100% !important
    }

    .dropdown-menu.show {
        min-width: inherit !important
    }

    .filter-option {
        color: white
    }
    </style>
@endsection

@section('heading')
Add a Product
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">Update a Product</h4>
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
                    enctype="multipart/form-data"  id="products-form" 
                        method="POST" action="{{ route('product.update',$product->id) }}">
                    @csrf
                    {{ method_field('PUT') }}  
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="logo">Image</label>
                            <input type="file" name="image" class="form-control" id="logo">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameAr">Arabic Name</label>
                            <input value="{{$product->nameAr}}" type="text" name="nameAr" class="form-control" id="nameAr">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="descriptionAr">Arabic Description</label>
                            <textarea 
                                class="form-control" 
                                    name="descriptionAr" 
                                        id="descriptionAr">{{$product->descriptionAr}}</textarea>
                        </div>
                    </div> 
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameEn">English Name</label>
                            <input value="{{$product->nameEn}}" type="text" class="form-control" name="nameEn" id="nameEn" >
                        </div>
                    </div>   
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="descriptionEn">English Description</label>
                            <textarea 
                                class="form-control" 
                                    name="descriptionEn" 
                                        id="descriptionEn">{{$product->descriptionEn}}</textarea>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="sku">SKU</label>
                            <input value="{{$product->sku}}"  type="text" name="sku" class="form-control" id="sku" >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="category">Category</label>
                            <select id="category_id" class="custom-select" onchange="handleChange()"
                            name="category_id" data-style="select-with-transition" title="category_id" data-size="7">

                                @foreach($categories as $category)

                                @if($product->category_id == $category->id) 

                                <option selected value="{{$category->id}}">{{$category->name}}</option>

                                @endif
                                <option  value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="printer">Printer</label>
                            <select id="printer_id" class="custom-select" onchange="handleChange()"
                            name="printer_id" data-style="select-with-transition" title="Printer" data-size="7">
                                @foreach($printers as $printer)

                                @if($product->printer_id == $printer->id) 

                                <option selected value="{{$printer->id}}">{{$printer->name}}</option>

                                @endif
                                <option  value="{{$printer->id}}">{{$printer->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="Class">Class</label>
                            <select id="class_id" class="custom-select" onchange="handleChange()"
                            name="class_id" data-style="select-with-transition" title="Classes" data-size="7">
                                @foreach($classes as $class)

                                @if($product->class_id == $class->id) 

                                <option selected value="{{$class->id}}">{{$class->nameAr}}</option>

                                @endif
                                <option  value="{{$class->id}}">{{$class->nameAr}}</option>
                                @endforeach
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
                                <input value="{{$product->timedEventFrom}}" type="text" name="timedEventFrom" class="form-control datetimepicker mt-2" id="timedEventFrom">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 mt-4">
                                <label class="bmd-label" for="timedEventTo">To</label>
                                <input value="{{$product->timedEventTo}}" type="text" name="timedEventTo" class="form-control datetimepicker mt-2" id="timedEventTo">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label label-checkbox">Price</label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" onchange="handleChange()" type="radio" name="price" value="0" checked> Open
                                        <span class="circle">
                                    <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" onchange="handleChange()" type="radio" name="price" value="pre"> Pre
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <input type="text" name="price" class="form-control col-md-4" id="pre_price" placeholder="price">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <label class="col-sm-2 col-form-label label-checkbox">Selling Type</label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input {{ $product->sellType == 'unit' ? 'checked' : '' }} 
                                            class="form-check-input" onchange="handleWeight()" type="radio" name="sellType" value="unit" checked> Unit
                                        <span class="circle">
                                    <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input {{ $product->sellType == 'weight' ? 'checked' : '' }} 
                                        class="form-check-input" 
                                            onchange="handleWeight()" 
                                                type="radio" 
                                                    name="sellType" 
                                                        value="weight"> Weight
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <input type="text" class="form-control col-md-4" id="weight_value" placeholder="value">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="tax">TAX</label>
                            <input value="{{$product->tax}}" type="text" name="tax" class="form-control" id="tax">
                        </div>
                    </div>
                    
                    <hr>

                    <div class="row"> 
                        <div class="form-group col-md-6 mt-6">
                            <!--label class="bmd-label mr-2" for="tax">Modifires</label-->
                            <select id="modifires" class="selectpicker" multiple name="modifires[]" data-live-search="true" title="modifires" data-size="7">
                
                                @foreach($modifires as $modifire)

                                        @foreach($product->modifires as $prModifId)

                                            @if($prModifId->id == $modifire->id) 
                                                <option 
                                                    selected 
                                                        value="{{$modifire->id}}">
                                                            {{$modifire->nameAr}}
                                                </option>
                                            @endif

                                        @endforeach
                                    <option value="{{$modifire->id}}">{{$modifire->nameAr}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="togglebutton mt-4">
                        <label>
                            <input {{ $product->active == 1 ? 'checked' : '' }} 
                                id="is-active" 
                                    name="active" 
                                        type="checkbox" onchange="handleActive()">
                            <span class="toggle"></span><span id="status"></span>
                        </label>
                    </div>

                    <hr>

                    <div class="text-muted">Product Ingredients</div>

                    <a id="add_ingredient" class="btn btn-success mr-4" style="color:white"><i class="material-icons">add</i> Add ingredient</a>
                    
                    <a id="remove_ingredient" class="btn btn-danger ml-4" style="color:white"><i class="material-icons">remove</i> Remove ingredient</a>

                    <div id="ingredients">
                        
                    </div>
                        <div class="card-footer ">
                            <button type="submit" 
                                    class="btn btn-fill btn-rose" 
                                        form="products-form">Submit</button>
                            <button type="submit" 
                                    class="btn btn-fill btn-rose">Submit and new</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    if ($('input[name=price]:checked').val() == 'pre') {
        $('#pre_price').slideDown();
        $('#pre_price').attr('required','required');
    } else {
        $('#pre_price').slideUp();
        $('#pre_price').removeAttr('required');
    }

    if ($('input[name=selling_type]:checked').val() == 'weight') {
        $('#weight_value').slideDown();
        $('#weight_value').attr('required','required');
    } else {
        $('#weight_value').slideUp();
        $('#weight_value').removeAttr('required'); 
    }

    function handleChange()
    {
        if ($('input[name=price]:checked').val() == 'pre') {
            $('#pre_price').slideDown();
            $('#pre_price').attr('required','required');
        } else {
            $('#pre_price').slideUp();
            $('#pre_price').removeAttr('required'); 
        }
    }
    function handleWeight()
    {
        if ($('input[name=selling_type]:checked').val() == 'weight') {
            $('#weight_value').slideDown();
            $('#weight_value').attr('required','required');
        } else {
            $('#weight_value').slideUp();
            $('#weight_value').removeAttr('required'); 
        }
    }
    
</script>

<script>
    $(document).ready(function() {
        // initialise Datetimepicker and Sliders
        md.initFormExtendedDatetimepickers();
        if ($('.slider').length != 0) {
            md.initSliders();
        }

        if ($('input[name=timed_event]:checked').length > 0) {
            $('#timed_event_section').slideDown();
        } else {
            $('#timed_event_section').slideUp();
        }

        if ($('input[name=active]:checked').length > 0) {
            $("#status").html("Active");
        } else {
            $("#status").html("Not active");
        }

        if($('.ings').length == 0) {
            $('#remove_ingredient').addClass('disabled')
        }
    });

    function handleEvent() {
        if ($('input[name=timed_event]:checked').length > 0) {
            $('#timed_event_section').slideDown();
        } else {
            $('#timed_event_section').slideUp();
        }
    }

    function handleActive() {
        
        if ($('input[name=active]:checked').length > 0) {
            $("#status").html("Active");
        } else {
            $("#status").html("Not active");
        }
    }
</script>

<script>
$("#add_ingredient").click(function(){
    $("#ingredients").append(
        '<div class="row ings">'
        +   '<div class="form-group col-md-4">'
        +       '<label class="bmd-label-floating" for="name">Name</label>'
        +       '<select id="ingredient_id" class="custom-select" name="ingredient_id[]" data-style="select-with-transition" title="ingredient_id" data-size="7">'
                   @if(count($ingredients) > 0)
                   @foreach($ingredients as $ingredient)
        +           '<option value="{{$ingredient->id}}">{{$ingredient->nameAr}}</option>'
                   @endforeach
                   @else + '<option value="">There Is No Modifiers To Add</option>'
                    @endif
        +       '</select>'
        +   '</div>'
        +   '<div class="form-group col-md-4 mt-4">'
        +      '<label class="bmd-label" for="quantity">Qantity</label>'
        +      '<input type="number" class="form-control mt-3" id="quantity" name="quantity[]">'
        +   '</div>'
        +'</div>'
    );

    $('#remove_ingredient').removeClass('disabled')
    
});

$("#remove_ingredient").click(function(){
    $('.ings').last().remove();
    if($('.ings').length == 0) {
        $('#remove_ingredient').addClass('disabled')
    }
});

</script>
@endsection