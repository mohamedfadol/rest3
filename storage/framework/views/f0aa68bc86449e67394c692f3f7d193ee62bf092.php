<?php $__env->startSection('head'); ?> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Add New ingredient')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">kitchen</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Add New ingredient')); ?></h4>
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
                <form method="POST" action="<?php echo e(route('ingredient.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameAr"><?php echo e(__('message.ingredient Arabic Name')); ?></label>
                            <input type="text" name="nameAr" class="form-control" id="nameAr" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameEn"><?php echo e(__('message.ingredient English Name')); ?></label>
                            <input type="text" name="nameEn" class="form-control" id="nameEn" >
                        </div>
                    </div>   

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note"><?php echo e(__('message.Note')); ?></label>
                            <input type="text" name="note" class="form-control" id="note" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="sku"><?php echo e(__('message.SKU')); ?></label>
                            <input type="text" name="sku" class="form-control" id="sku" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="category"><?php echo e(__('message.Unit')); ?></label>
                            <select id="type" class="custom-select" name="unit" data-style="select-with-transition" title="type" data-size="7">
                                <option value="Pices">Pices</option>
                                <option value="Kg">Kg</option>
                            </select>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="price"><?php echo e(__('message.Price')); ?></label>
                            <input type="number" name="price" class="form-control" id="price" required>
                        </div>
                    </div>

                    <div class="card-footer ">
                        <button type="submit" class="btn btn-fill btn-rose"><?php echo e(__('message.Submit')); ?></button>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\ingredients\create.blade.php ENDPATH**/ ?>