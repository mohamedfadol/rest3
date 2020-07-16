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
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Edit Modifire')); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">power</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Edit Modifire')); ?></h4>
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
                <form method="POST" action="<?php echo e(route('modifire.update' , $modifire->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PUT')); ?>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameAr"><?php echo e(__('message.modifire Arabic Name')); ?></label>
                            <input value="<?php echo e($modifire->nameAr); ?>" type="text" class="form-control" id="nameAr" name="nameAr">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameEn"><?php echo e(__('message.modifire English Name')); ?></label>
                            <input value="<?php echo e($modifire->nameEn); ?>" type="text" class="form-control" id="nameEn" name="nameEn">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="sku"><?php echo e(__('message.SKU')); ?></label>
                            <input value="<?php echo e($modifire->sku); ?>" type="text" class="form-control" id="sku" name="sku">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="cost"><?php echo e(__('message.Cost')); ?></label>
                            <input value="<?php echo e($modifire->cost); ?>" type="number" class="form-control" id="cost" name="cost">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="tax"><?php echo e(__('message.Tax')); ?></label>
                            <input value="<?php echo e($modifire->tax); ?>" type="number" class="form-control" id="tax" name="tax">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="price"><?php echo e(__('message.Price')); ?></label>
                            <input value="<?php echo e($modifire->price); ?>" type="number" class="form-control" id="price" name="price">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <label class="col-sm-2 col-form-label label-checkbox"><?php echo e(__('message.Unit')); ?></label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input 
                                    class="form-check-input" 
                                        onchange="handleWeight()" 
                                            type="radio" 
                                                name="unit" 
                                                    value="Kg" 
                                    <?php echo e($modifire->unit == 'Kg' ? 'checked' : ''); ?>> Kg
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
                                    <?php echo e($modifire->unit == 'Pices' ? 'checked' : ''); ?>> Pices
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
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
    ##parent-placeholder-cb5346a081dcf654061b7f897ea14d9b43140712##
    <script src="<?php echo asset('js/mapInput.js'); ?>"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="<?php echo asset('theme/js/plugins/bootstrap-datetimepicker.min.js'); ?>"></script>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\modifires\edit.blade.php ENDPATH**/ ?>