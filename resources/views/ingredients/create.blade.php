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
Add an Ingredient
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">kitchen</i>
                </div>
                <h4 class="card-title">Add an Ingredient</h4>
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
                <form method="POST" action="{{ route('ingredient.create') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameAr">Arabic Name</label>
                            <input type="text" name="nameAr" class="form-control" id="nameAr" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameEn">English Name</label>
                            <input type="text" name="nameEn" class="form-control" id="nameEn" required>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note">Note</label>
                            <input type="text" name="note" class="form-control" id="note" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="sku">Sku</label>
                            <input type="text" name="sku" class="form-control" id="sku" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="category">Unit</label>
                            <select id="type" class="custom-select" name="unit" data-style="select-with-transition" title="type" data-size="7">
                                <option value="Pices">Pices</option>
                                <option value="Kg">Kg</option>
                            </select>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="price">Price</label>
                            <input type="text" name="price" class="form-control" id="price" required>
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
<script>
    if ($('input[name=price]:checked').val() == 'pre') {
        $('#pre_price').slideDown();
        $('#pre_price').attr('required','required');
    } else {
        $('#pre_price').slideUp();
        $('#pre_price').removeAttr('required');
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
    
</script>

<script>
    $(document).ready(function() {
        // initialise Datetimepicker and Sliders
        md.initFormExtendedDatetimepickers();
        if ($('.slider').length != 0) {
            md.initSliders();
        }
    });
</script>

<script>
$("#add_ingredient").click(function(){
    $("#ingredients").append(
        '<div class="row">'
        + '<div class="form-group col-md-4">'
            + '<label class="bmd-label-floating" for="name">Name</label>'
            + '<select id="ingredient_name" class="custom-select" name="ingredient_name" data-style="select-with-transition" title="ingredient_name" data-size="7">'
                + '<option value="">Apple</option>'
                + '<option value="">Oragnge</option>'
                + '<option value="">Tomato</option>'
                + '<option value="">Potato</option>'
            + '</select>'
        + '</div>'
        + '<div class="form-group col-md-4 mt-4">'
            + '<label class="bmd-label" for="quantity">Qantity</label>'
            + '<input type="number" class="form-control mt-3" id="quantity" name="quantity">'
        + '</div>'
    + '</div>'
    );
});
</script>
@endsection