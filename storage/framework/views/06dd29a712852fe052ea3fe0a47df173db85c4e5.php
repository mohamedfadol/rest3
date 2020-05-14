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
Update a Customer
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">local_cafe</i>
                </div>
                <h4 class="card-title">Update a Customer</h4>
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
                            <label class="bmd-label-floating" for="name">Name</label>
                            <input 
                                type="text" 
                                    class="form-control" 
                                        id="name" 
                                            name="name" value="<?php echo e($customer->name); ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="nationality">Nationality</label>
                            <input class="form-control" 
                                            id="nationality" 
                                                name="nationality" 
                                                    value="<?php echo e($customer->nationality); ?>" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="email">E-mail</label>
                            <input class="form-control" 
                                            id="email" 
                                                name="email" 
                                                    value="<?php echo e($customer->email); ?>" 
                                                        required />
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="phone">Phone</label>
                            <input class="form-control" 
                                            id="phone" 
                                                name="phone" 
                                                    value="<?php echo e($customer->phone); ?>" 
                                                        required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="country">Country</label>
                            <input class="form-control" 
                                            id="country" 
                                                name="country" 
                                                    value="<?php echo e($customer->country); ?>"  
                                                        required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="state">State</label>
                            <input class="form-control" 
                                            id="state" 
                                                name="state" 
                                                    value="<?php echo e($customer->state); ?>"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="city">City</label>
                            <input class="form-control" 
                                            id="city" 
                                                name="city" 
                                                    value="<?php echo e($customer->city); ?>"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="area">Area</label>
                            <input class="form-control" 
                                            id="area" 
                                                name="area" 
                                                    value="<?php echo e($customer->area); ?>"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="street">Street</label>
                            <input class="form-control" 
                                            id="street" 
                                                name="street" 
                                                    value="<?php echo e($customer->street); ?>"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="creditCard">Credit-Card</label>
                            <input class="form-control" 
                                            id="creditCard" 
                                                name="creditCard" 
                                                    value="<?php echo e($customer->creditCard); ?>"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="discount">Discount</label>
                            <input class="form-control" 
                                            id="discount" 
                                                name="discount" 
                                                    value="<?php echo e($customer->discount); ?>"  
                                                        required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note">Note</label>
                            <input class="form-control" 
                                            id="note" 
                                                name="note" 
                                                    value="<?php echo e($customer->note); ?>"  
                                                        required />
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

<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\customers\edit.blade.php ENDPATH**/ ?>