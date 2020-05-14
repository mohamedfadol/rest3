<?php $__env->startSection('head'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
Add a Product
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                    <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger py-2">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                <form 
                    enctype="multipart/form-data"  id="products-form" 
                        method="POST" action="<?php echo e(route('product.update',$product->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PUT')); ?>  
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="logo">Image</label>
                            <input type="file" name="image" class="form-control" id="logo">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameAr">Arabic Name</label>
                            <input value="<?php echo e($product->nameAr); ?>" type="text" name="nameAr" class="form-control" id="nameAr">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="descriptionAr">Arabic Description</label>
                            <textarea 
                                class="form-control" 
                                    name="descriptionAr" 
                                        id="descriptionAr"><?php echo e($product->descriptionAr); ?></textarea>
                        </div>
                    </div> 
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameEn">English Name</label>
                            <input value="<?php echo e($product->nameEn); ?>" type="text" class="form-control" name="nameEn" id="nameEn" >
                        </div>
                    </div>   
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="descriptionEn">English Description</label>
                            <textarea 
                                class="form-control" 
                                    name="descriptionEn" 
                                        id="descriptionEn"><?php echo e($product->descriptionEn); ?></textarea>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="sku">SKU</label>
                            <input value="<?php echo e($product->sku); ?>"  type="text" name="sku" class="form-control" id="sku" >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="category">Category</label>
                            <select id="category_id" class="custom-select" onchange="handleChange()"
                            name="category_id" data-style="select-with-transition" title="category_id" data-size="7">

                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($product->category_id == $category->id): ?> 

                                <option selected value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>

                                <?php endif; ?>
                                <option  value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <input value="<?php echo e($product->timedEventFrom); ?>" type="text" name="timedEventFrom" class="form-control datetimepicker mt-2" id="timedEventFrom">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 mt-4">
                                <label class="bmd-label" for="timedEventTo">To</label>
                                <input value="<?php echo e($product->timedEventTo); ?>" type="text" name="timedEventTo" class="form-control datetimepicker mt-2" id="timedEventTo">
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
                                    <input <?php echo e($product->sellType == 'unit' ? 'checked' : ''); ?> 
                                            class="form-check-input" onchange="handleWeight()" type="radio" name="sellType" value="unit" checked> Unit
                                        <span class="circle">
                                    <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input <?php echo e($product->sellType == 'weight' ? 'checked' : ''); ?> 
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
                            <input value="<?php echo e($product->tax); ?>" type="text" name="tax" class="form-control" id="tax">
                        </div>
                    </div>
                    
                    <hr>

                    <div class="row"> 
                        <div class="form-group col-md-6 mt-6">
                            <!--label class="bmd-label mr-2" for="tax">Modifires</label-->
                            <select id="modifires" class="selectpicker" multiple name="modifires[]" data-live-search="true" title="modifires" data-size="7">
                
                                <?php $__currentLoopData = $modifires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php $__currentLoopData = $product->modifires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prModifId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($prModifId->id == $modifire->id): ?> 
                                                <option 
                                                    selected 
                                                        value="<?php echo e($modifire->id); ?>">
                                                            <?php echo e($modifire->nameAr); ?>

                                                </option>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($modifire->id); ?>"><?php echo e($modifire->nameAr); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>
                    </div>

                    <div class="togglebutton mt-4">
                        <label>
                            <input <?php echo e($product->active == 1 ? 'checked' : ''); ?> 
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
                   <?php if(count($ingredients) > 0): ?>
                   <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        +           '<option value="<?php echo e($ingredient->id); ?>"><?php echo e($ingredient->nameAr); ?></option>'
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php else: ?> + '<option value="">There Is No Modifiers To Add</option>'
                    <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\products\edit.blade.php ENDPATH**/ ?>