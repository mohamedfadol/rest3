<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Add New Customer')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Add New Customer')); ?> </h4>
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
                <form method="POST" action="<?php echo e(route('customer.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name"><?php echo e(__('message.Customer Name')); ?></label>
                            <input 
                                type="text" 
                                    class="form-control" 
                                        id="name" 
                                            name="name" 
                                                required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nationality"><?php echo e(__('message.Nationality')); ?></label>
                            <input class="form-control" 
                                            id="nationality" 
                                                name="nationality" 
                                                    required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="email"><?php echo e(__('message.E-mail')); ?></label>
                            <input class="form-control" 
                                            id="email" 
                                                name="email" 
                                                    required />
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="phone"><?php echo e(__('message.Phone')); ?></label>
                            <input class="form-control" 
                                            id="phone" 
                                                name="phone"
                                                    required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="country"><?php echo e(__('message.Country')); ?></label>
                            <input class="form-control" 
                                            id="country" 
                                                name="country" 
                                                    required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="state"><?php echo e(__('message.State')); ?></label>
                            <input class="form-control" 
                                            id="state" 
                                                name="state" 
                                                    required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="city"><?php echo e(__('message.City')); ?></label>
                            <input class="form-control" 
                                            id="city" 
                                                name="city"
                                                    required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="area"><?php echo e(__('message.Area')); ?></label>
                            <input class="form-control" 
                                            id="area" 
                                                name="area"
                                                    required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="street"><?php echo e(__('message.Street')); ?></label>
                            <input class="form-control" 
                                            id="street" 
                                                name="street"  
                                                    required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="creditCard"><?php echo e(__('message.CreditCard')); ?></label>
                            <input class="form-control" 
                                            id="creditCard" 
                                                name="creditCard" 
                                                    required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="discount"><?php echo e(__('message.Discount')); ?></label>
                            <input class="form-control" 
                                            id="discount" 
                                                name="discount"
                                                    required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note"><?php echo e(__('message.Note')); ?></label>
                            <input class="form-control" 
                                            id="note" 
                                                name="note" 
                                                    required />
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

<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\customers\create.blade.php ENDPATH**/ ?>