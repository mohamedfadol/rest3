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
Add a Printer
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">Add a Printer</h4>
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
                <form method="POST" action="<?php echo e(route('printer.create')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">Arabic Name</label>
                            <input type="text" 
                                        name="name" 
                                            class="form-control" 
                                                id="name" 
                                                    required
                                                    >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="enName">English Name</label>
                            <input type="text" 
                                        class="form-control" 
                                            name="enName" 
                                                id="enName" 
                                                    required
                                                    >
                        </div>
                    </div>   

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="printer">Printer</label>
                            <input type="text" 
                                        name="printer" 
                                            class="form-control" 
                                                id="printer" 
                                                    required
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="printerName">Printer Name</label>
                            <input type="text" 
                                        name="printerName" 
                                            class="form-control" 
                                                id="printerName" 
                                                    required
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="printerIndex">Printer Index</label>
                            <input type="number" 
                                        name="printerIndex" 
                                            class="form-control" 
                                                id="printerIndex" 
                                                    required
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="copiesNumber">Copies Number Times</label>
                            <input type="number" 
                                        name="copiesNumber" 
                                            class="form-control" 
                                                id="copiesNumber" 
                                                    required
                                                    >
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="note">Notes</label>
                            <input type="text" 
                                        name="note" 
                                            class="form-control" 
                                                id="note" 
                                                    required
                                                    >
                        </div>
                    </div> 
                    <div class="row">
                        <div class="form-group col-md-6 mt-6"> 
                            <label class="bmd-label-floating" for="branch">Branch</label>
                            <select id="branch" class="custom-select" name="branch_id" data-style="select-with-transition" title="Branch" data-size="7">
                                <option value=""> Choose ... Branch</option>
                                <?php if(count($branches) > 0): ?>
                                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <option value="">Ther's No Branch To Add</option>
                                <?php endif; ?>
                            </select>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views/printer/create.blade.php ENDPATH**/ ?>