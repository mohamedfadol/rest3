<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Update a Customer')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Update a Customer')); ?></h4>
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
                <form method="POST" action="<?php echo e(route('customer.update' , $customer->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PUT')); ?>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name"><?php echo e(__('message.Customer Name')); ?></label>
                            <input 
                                type="text" 
                                    class="form-control" 
                                        id="name" 
                                            name="name" value="<?php echo e($customer->name); ?>" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nationality"><?php echo e(__('message.Nationality')); ?></label>
                            <input class="form-control" 
                                            id="nationality" 
                                                name="nationality" 
                                                    value="<?php echo e($customer->nationality); ?>" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="email"><?php echo e(__('message.E-mail')); ?></label>
                            <input class="form-control" 
                                            id="email" 
                                                name="email" 
                                                    value="<?php echo e($customer->email); ?>" 
                                                        required />
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="phone"><?php echo e(__('message.Phone')); ?></label>
                            <input class="form-control" 
                                            id="phone" 
                                                name="phone" 
                                                    value="<?php echo e($customer->phone); ?>" 
                                                        required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="country"><?php echo e(__('message.Country')); ?></label>
                            <input class="form-control" 
                                            id="country" 
                                                name="country" 
                                                    value="<?php echo e($customer->country); ?>"  
                                                        required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="state"><?php echo e(__('message.State')); ?></label>
                            <input class="form-control" 
                                            id="state" 
                                                name="state" 
                                                    value="<?php echo e($customer->state); ?>"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="city"><?php echo e(__('message.City')); ?></label>
                            <input class="form-control" 
                                            id="city" 
                                                name="city" 
                                                    value="<?php echo e($customer->city); ?>"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="area"><?php echo e(__('message.Area')); ?></label>
                            <input class="form-control" 
                                            id="area" 
                                                name="area" 
                                                    value="<?php echo e($customer->area); ?>"  
                                                        required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="street"><?php echo e(__('message.Street')); ?></label>
                            <input class="form-control" 
                                            id="street" 
                                                name="street" 
                                                    value="<?php echo e($customer->street); ?>"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="creditCard"><?php echo e(__('message.CreditCard')); ?></label>
                            <input class="form-control" 
                                            id="creditCard" 
                                                name="creditCard" 
                                                    value="<?php echo e($customer->creditCard); ?>"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="discount"><?php echo e(__('message.Discount')); ?></label>
                            <input class="form-control" 
                                            id="discount" 
                                                name="discount" 
                                                    value="<?php echo e($customer->discount); ?>"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note"><?php echo e(__('message.Note')); ?></label>
                            <input class="form-control" 
                                            id="note" 
                                                name="note" 
                                                    value="<?php echo e($customer->note); ?>"  
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

<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\customers\edit.blade.php ENDPATH**/ ?>