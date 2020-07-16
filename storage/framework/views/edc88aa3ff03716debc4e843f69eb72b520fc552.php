<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Edit BillKind')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">bill_kind</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Edit BillKind')); ?></h4>
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
                <form method="POST" action="<?php echo e(route('billKind.update',$billKind->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PUT')); ?>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="BillKindNumber">
                            <?php echo e(__('message.BillKind Number')); ?></label>
                            <input type="number" name="BillKindNumber" class="form-control" id="BillKindNumber" value="<?php echo e($billKind->BillKindNumber); ?>" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="BillKindName">
                            <?php echo e(__('message.BillKind Name')); ?></label>
                            <input type="text" name="BillKindName" class="form-control" id="BillKindName" value="<?php echo e($billKind->BillKindName); ?>" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="BillKindNameEnglish">
                            <?php echo e(__('message.BillKind Name English')); ?></label>
                            <input type="text" name="BillKindNameEnglish" class="form-control" id="BillKindNameEnglish" value="<?php echo e($billKind->BillKindNameEnglish); ?>">
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

<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\billKind\edit.blade.php ENDPATH**/ ?>