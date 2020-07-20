<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Edit a Employee')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class='col-lg-4 col-lg-offset-4'>

    <h3><i class='fa fa-user-plus'></i> Edit <?php echo e($employee->name); ?></h3>
    <hr>
    
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger py-2">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    <form action="<?php echo e(route('employees.update' , $employee->id)); ?>" method="POST" accept-charset="utf-8">
        <?php echo csrf_field(); ?>
        <?php echo e(method_field('PUT')); ?>

    <div class="form-group">   
        <input type="text" 
                    name="firstName" 
                        value="<?php echo e($employee->firstName); ?>" 
                            placeholder="Enter First Name For User"  
                                class="form-control">
    </div>

    <div class="form-group">
        <input type="text" 
            name="LastName" 
                value="<?php echo e($employee->LastName); ?>" 
                    placeholder="Enter Last Name For User" 
                        class="form-control">
    </div> 
 
    <div class="form-group">
        <input type="number" 
                    name="binCode" 
                        value="<?php echo e($employee->binCode); ?>" 
                            placeholder=" Enter BinCode For User" 
                                class="form-control">
    </div>

    <h5><b><?php echo e(__('message.Give Role')); ?></b></h5>

    <div class='form-group'>
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e(Form::checkbox('roles[]',  $role->id, $employee->roles )); ?>

            <?php echo e(Form::label($role->name, ucfirst($role->name))); ?><br>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>



    <div class="form-group">
        <label class="bmd-label-floating" for="branch"><?php echo e(__('message.Branch')); ?></label>
        <select id="Branch" class="custom-select" name="branch_id" data-style="select-with-transition" title="Branch" data-size="7">
            <?php if(isset($branches)): ?>
                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($branch->id == $employee->branch_id): ?>
                    <option selected value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                <?php else: ?> 
                    <option value="">Choose ... Branch</option>
                    <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                <?php endif; ?>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
            <?php endif; ?>
        </select>
    </div>

    <div class="form-group">
        <label class="bmd-label-floating" for="floor"><?php echo e(__('message.Floor')); ?></label>
        <select id="floor" class="custom-select" name="floor_id" data-style="select-with-transition" title="Floor" data-size="7">
            <?php if(isset($floors)): ?>
                <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($floor->id == $employee->floor_id): ?>
                    <option selected value="<?php echo e($floor->id); ?>"><?php echo e($floor->name); ?></option>
                <?php else: ?> 
                    <option value="">Choose ... Floor</option>
                    <option value="<?php echo e($floor->id); ?>"><?php echo e($floor->name); ?></option>
                <?php endif; ?>  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
            <?php endif; ?>
        </select>
    </div>

    <input type="submit"  value="Udate Employee" class="tn btn-primary">

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\employees\edit.blade.php ENDPATH**/ ?>