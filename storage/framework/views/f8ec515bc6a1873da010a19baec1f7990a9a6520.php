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
Add an Employee
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">Add an Employee</h4>
            </div>
            <div class="card-body ">
                <form method="#" action="#">
                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="tax">Type</label>
                            <select id="type" class="custom-select" onchange="handleChange()"name="type" data-style="select-with-transition" title="type" data-size="7">
                                <option value="">Web</option>
                                <option value="">App</option>
                                <option value="">Owner</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="name">Employee's name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="employee_id">Employee's id</label>
                            <input type="text" class="form-control" id="employee_id">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="username">Username</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label-floating" for="password">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                    </div>

                    <div id="web">
                        <div class="row">
                            <div class="form-group col-md-6 mt-4">
                                <label class="bmd-label-floating" for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone">
                            </div>
                            <div class="form-group col-md-6 mt-4">
                                <label class="bmd-label-floating" for="email">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>

                        <div class="col-sm-10 checkbox-radios">
                            <label for="">Language</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="exampleRadios" value="option2" checked> العربية
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="exampleRadios" value="option1"> English
                                <span class="circle">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-6">
                            <label class="bmd-label-floating" for="tax">Role</label>
                            <select id="role" class="custom-select" name="role" data-style="select-with-transition" title="role" data-size="7">
                                <option value="">Cacheir</option>
                                <option value="">Accountant</option>
                                <option value="">Owner</option>
                            </select>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                <button type="submit" class="btn btn-fill btn-rose">Submit and new</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    function handleChange(type) {
        var name = $('#type option:selected').html();

        if(name == 'Web') {
            $('#web').delay(0).slideDown(300);
            $('#role').removeAttr('disabled');
            
        } else if(name == 'App') {
            $('#web').delay(0).slideUp(300);
            $('#role').removeAttr('disabled');

        }else {
            $('#web').delay(0).slideDown(300);
            $('#role').attr('disabled','disabled');
        }
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\employees\create.blade.php ENDPATH**/ ?>