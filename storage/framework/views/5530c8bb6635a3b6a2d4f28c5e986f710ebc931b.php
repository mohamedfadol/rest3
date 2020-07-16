<?php $__env->startSection('heading'); ?>
<?php echo e(__('message.Add New Category')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title"><?php echo e(__('message.Add New Category')); ?></h4>
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
                <form id="categories-form" method="POST" action="<?php echo e(route('category.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">

                            <label class="bmd-label-floating" for="image"><?php echo e(__('message.Icon')); ?></label>
                            <input  class="form-control" name="image" type="file" id="image">
                            <img id="blah" src="#" alt="..." class="img-thumbnail">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name"><?php echo e(__('message.Category Name')); ?></label>
                            <input id="name" type="text" class="form-control" name="name" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="sku"><?php echo e(__('message.SKU')); ?></label>
                            <input type="text" class="form-control" id="sku" name="sku" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="parent_category"><?php echo e(__('message.Parent Category')); ?></label>
                            <select id="parent_category" class="custom-select" name="cat_id" data-style="select-with-transition" title="parent_category" data-size="7">
                                    <option value="0">Parent Categories</option>
                                <?php if($categories->isEmpty()): ?>
                                <?php else: ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-check mt-4">
                        <label class="form-check-label">
                            <input id="timed_event" name="timed_event" class="form-check-input" type="checkbox" onchange="handleEvent()"> <?php echo e(__('message.Active')); ?>

                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    
                    <div id="timed_event_section">
                        <div class="row">
                            <div class="form-group col-md-6 mt-4">
                                <label class="bmd-label" for="timedEventFrom"><?php echo e(__('message.From')); ?></label>
                                <input type="text" name="timedEventFrom" class="form-control datetimepicker mt-2" id="timedEventFrom">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 mt-4">  
                                <label class="bmd-label" for="timedEventTo"><?php echo e(__('message.To')); ?></label>
                                <input type="text" name="timedEventTo" class="form-control datetimepicker mt-2" id="timedEventTo">
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="togglebutton">
                        <label>
                        <input id="is-active" name="active" type="checkbox" onchange="handleChange()">
                            <span class="toggle"></span><span id="status"></span>
                        </label>
                    </div>

                </form>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-fill btn-rose" form="categories-form">
                <?php echo e(__('message.Submit')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script>
    $(document).ready(function() {
        // initialise Datetimepicker and Sliders
        md.initFormExtendedDatetimepickers();
        if ($('.slider').length != 0) {
            md.initSliders();
        }


        if ($('input[name=active]:checked').length > 0) {
            $("#status").html("Active");
        } else {
            $("#status").html("Not active");
        }

        if ($('input[name=timed_event]:checked').length > 0) {
            $('#timed_event_section').slideDown();
        } else {
            $('#timed_event_section').slideUp();
        }

    });
    function handleChange() {
        
        if ($('input[name=active]:checked').length > 0) {
            $("#status").html("Active");
        } else {
            $("#status").html("Not active");
        }
    }
    function handleEvent() {
        if ($('input[name=timed_event]:checked').length > 0) {
            $('#timed_event_section').slideDown();
        } else {
            $('#timed_event_section').slideUp();
        }
    }
    
    /* function for perview image*/
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#image").change(function(){
        readURL(this);
    });
    /* function for perview image*/

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\categories\create.blade.php ENDPATH**/ ?>