<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Add New Payment')); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">power</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Add New Payment')); ?> </h4>
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
                <form method="POST" action="<?php echo e(route('payment.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name"><?php echo e(__('message.Payment Arabic Name')); ?></label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameEn"><?php echo e(__('message.Payment English Name')); ?></label>
                            <input type="text" class="form-control" id="nameEn" name="nameEn">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note"><?php echo e(__('message.Note')); ?></label>
                            <input type="text" class="form-control" id="note" name="note">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-check mt-4">
                            <label class="form-check-label" for="value"><?php echo e(__('message.Payment Value')); ?></label>
                                <input type="checkbox" 
                                            class="" 
                                                value="1"  
                                                    id="value" 
                                                        name="value">
                            <label class="form-check-label" for="type"><?php echo e(__('message.Payment Type')); ?></label>
                                <input type="checkbox" 
                                            class="" 
                                                value="1" 
                                                    id="type" 
                                                        name="type">
                            <label class="form-check-label" for="default"><?php echo e(__('message.Payment Default')); ?></label>
                                <input type="checkbox" 
                                            class="" 
                                                value="1" 
                                                    id="default" 
                                                        name="default">

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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\payment\create.blade.php ENDPATH**/ ?>