<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Update Discount')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_offer</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Update Discount')); ?></h4>
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
                <form method="Post" action="<?php echo e(route('discount.update' ,$discount->id)); ?>">
                      <?php echo csrf_field(); ?>
                      <?php echo e(method_field('PUT')); ?>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name"><?php echo e(__('message.Discount Name')); ?></label>
                            <input type="text"  value="<?php echo e($discount->name); ?>" 
                                    class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <label class="col-sm-2 col-form-label label-checkbox"><?php echo e(__('message.Discount Type')); ?></label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" 
                                            type="radio" 
                                                name="type" 
                                                <?php echo e($discount->type == 'open' ? 'checked' : ''); ?>

                                                    value="open"> Percent
                                                }
                                                }
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
                                            <?php echo e($discount->type == 'pre' ? 'checked' : ''); ?>

                                                value="pre"> Fixed
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="amount"><?php echo e(__('message.Discount Amount')); ?></label>
                            <input type="text"  value="<?php echo e($discount->amount); ?>"
                                        class="form-control" id="amount" name="amount" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="product_id"><?php echo e(__('message.Discount Product Name')); ?></label>
                            <select id="product_id" class="custom-select" name="product_id" data-style="select-with-transition" title="product_id" data-size="7">
                                <?php if(count($products) > 0): ?>
                                <option value="">Choose...Product</option>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->nameAr); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                <?php endif; ?>
                            </select>
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

<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\discounts\edit.blade.php ENDPATH**/ ?>