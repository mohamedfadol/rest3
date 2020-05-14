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
Update a Giftcard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">card_giftcard</i>
                </div>
                <h4 class="card-title">Update a Giftcard</h4>
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
                <form method="POST" action="<?php echo e(route('giftcard.update' , $giftcard->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PUT')); ?>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">Name</label>
                            <input type="text" 
                                        name="name" value="<?php echo e($giftcard->name); ?>" 
                                            class="form-control" id="name">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <label class="col-sm-2 col-form-label label-checkbox">Type</label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                        type="radio" 
                                            name="type" 
                                            <?php echo e($giftcard->type == 'percent' ? 'checked' :''); ?>

                                                value="percent" > Percent
                                        <span class="circle">
                                    <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                        type="radio" 
                                            name="type" 
                                                <?php echo e($giftcard->type == 'fixed' ? 'checked' :''); ?>

                                                value="fixed"> Fixed
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="amount">Amount</label>
                            <input type="text" 
                                        name="amount" value="<?php echo e($giftcard->amount); ?>"
                                            class="form-control" id="amount">
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="ValidFrom" class="col-form-label col-md-4">Valid From</label>
                                <input type="text" 
                                        name="ValidFrom" value="<?php echo e($giftcard->ValidFrom); ?>"
                                            class="form-control datepicker col-md-4">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="validTo" class="col-form-label col-md-4">Valid To</label>
                                <input type="text" 
                                        name="validTo" value="<?php echo e($giftcard->validTo); ?>"
                                            class="form-control datepicker col-md-4">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="couponNumber">Number of Coupons</label>
                            <input type="number" 
                                    name="couponNumber" value="<?php echo e($giftcard->couponNumber); ?>"
                                        class="form-control" id="couponNumber">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <label class="col-sm-2 col-form-label label-checkbox">Valid on</label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                            type="checkbox" name="validOn" 
                                                <?php echo e($giftcard->validOn == 'monday' ? 'checked' :''); ?>

                                                value="monday"> Monday
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                                type="checkbox" name="validOn" 
                                                <?php echo e($giftcard->validOn == 'tuesday' ? 'checked' :''); ?>

                                                    value="tuesday"> Tuesday
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                            type="checkbox" name="validOn" 
                                            <?php echo e($giftcard->validOn == 'wednesday' ? 'checked' :''); ?>

                                                value="wednesday"> Wednesday
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                            type="checkbox" name="validOn" 
                                            <?php echo e($giftcard->validOn == 'thursday' ? 'checked' :''); ?>

                                                    value="thursday"> Thursday
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                            type="checkbox" name="validOn" 
                                            <?php echo e($giftcard->validOn == 'friday' ? 'checked' :''); ?>

                                                value="friday"> Friday
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                            type="checkbox" name="validOn" 
                                            <?php echo e($giftcard->validOn == 'saturday' ? 'checked' :''); ?>

                                                value="saturday"> Saturday
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                            type="checkbox" name="validOn" 
                                            <?php echo e($giftcard->validOn == 'sunday' ? 'checked' :''); ?>

                                                value="sunday"> Sunday
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        // initialise Datetimepicker and Sliders
        md.initFormExtendedDatetimepickers();
        if ($('.slider').length != 0) {
            md.initSliders();
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\giftcards\edit.blade.php ENDPATH**/ ?>