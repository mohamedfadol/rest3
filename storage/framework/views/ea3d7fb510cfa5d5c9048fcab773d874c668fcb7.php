<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Edit a Payment')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">power</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Edit a Payment')); ?></h4>
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
                <form method="POST" action="<?php echo e(route('payment.update' , $payment->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PUT')); ?>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name"><?php echo e(__('message.Payment Arabic Name')); ?></label>
                            <input type="text" 
                                        class="form-control" 
                                            id="name" 
                                                name="name"
                                                    value="<?php echo e($payment->name); ?>"
                                                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nameEn">
                            <?php echo e(__('message.Payment English Name')); ?></label>
                            <input type="text" 
                                        class="form-control" 
                                            id="nameEn" 
                                                name="nameEn"
                                                    value="<?php echo e($payment->nameEn); ?>"
                                                        >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note"><?php echo e(__('message.Note')); ?></label>
                            <input type="text" 
                                        class="form-control" 
                                            id="note" 
                                                name="note"
                                                    value="<?php echo e($payment->note); ?>"
                                                        >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2 ">
                            <label class="form-check-label" for="value"><?php echo e(__('message.Payment Value')); ?></label>
                            <input type="checkbox" 
                                        <?php echo e($payment->value == 1 ? 'checked' : ''); ?> 
                                            id="value" 
                                                name="value"
                                                    value="<?php echo e($payment->value); ?>"
                                                        >
                                        
                            <label class="form-check-label" for="type">
                            <?php echo e(__('message.Payment Type')); ?></label>
                            <input type="checkbox" 
                                        <?php echo e($payment->type == 1 ? 'checked' : ''); ?>

                                                id="type" 
                                                    name="type"
                                                        value="<?php echo e($payment->type); ?>"
                                                            >
                            <label class="form-check-label" for="default"><?php echo e(__('message.Payment Default')); ?></label>
                            <input type="checkbox" 
                                        <?php echo e($payment->default == 1 ? 'checked' : ''); ?>

                                            id="default" 
                                                name="default"
                                                    value="<?php echo e($payment->default); ?>"
                                                        >
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\payment\edit.blade.php ENDPATH**/ ?>