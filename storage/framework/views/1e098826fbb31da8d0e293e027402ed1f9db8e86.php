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

    .dropdown.bootstrap-select.show-tick {
        width: 100% !important
    }

    .dropdown-menu.show {
        min-width: inherit !important
    }

    .filter-option {
        color: white
    }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
Edit a Employee
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class='col-lg-4 col-lg-offset-4'>

    <h3><i class='fa fa-user-plus'></i> Edit <?php echo e($user->name); ?></h3>
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
    <form action="<?php echo e(route('users.update' , $user->id)); ?>" method="POST" accept-charset="utf-8">
        <?php echo csrf_field(); ?>
        <?php echo e(method_field('PUT')); ?>

    <div class="form-group">   
        <label for="name">User Name</label>
        <input type="text" 
                    name="name" 
                        value="<?php echo e($user->name); ?>" 
                            placeholder="Enter Name For User" 
                                class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" 
            name="email" 
                value="<?php echo e($user->email); ?>" 
                    placeholder="Enter Email For User" 
                        class="form-control">
    </div> 
 
    <div class="form-group">
        <label for="binCode">BinCode</label>
        <input type="number" 
                    name="binCode" 
                        value="<?php echo e($user->binCode); ?>" 
                            placeholder=" Enter BinCode For User" 
                                class="form-control">
    </div>

    <h5><b>Give Role</b></h5>

    <div class='form-group'>
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e(Form::checkbox('roles[]',  $role->id, $user->roles )); ?>

            <?php echo e(Form::label($role->name, ucfirst($role->name))); ?><br>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>



    <div class="form-group">
        <label class="bmd-label-floating" for="branch">Branch</label>
        <select id="Branch" class="custom-select" name="branch_id" data-style="select-with-transition" title="Branch" data-size="7">
            <?php if(isset($branches)): ?>
                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($branch->id == $user->branch_id): ?>
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
        <label class="bmd-label-floating" for="floor">Floor</label>
        <select id="floor" class="custom-select" name="floor_id" data-style="select-with-transition" title="Floor" data-size="7">
            <?php if(isset($floors)): ?>
                <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($floor->id == $user->floor_id): ?>
                    <option selected value="<?php echo e($floor->id); ?>"><?php echo e($floor->name); ?></option>
                <?php else: ?> 
                    <option value="">Choose ... Floor</option>
                    <option value="<?php echo e($floor->id); ?>"><?php echo e($floor->name); ?></option>
                <?php endif; ?>  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
            <?php endif; ?>
        </select>
    </div>

    <input type="submit"  value="Udate User" class="tn btn-primary">

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\users\edit.blade.php ENDPATH**/ ?>