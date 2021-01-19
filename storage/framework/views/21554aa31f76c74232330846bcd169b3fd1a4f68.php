

    <?php $__env->startSection('content'); ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                        <div class="x_title">
                            <h2> تقاربر المبيعات  للمواد </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                    <form id="demo-form2" action="<?php echo e(route('showRepSalMats')); ?>" method="post" 
                        data-parsley-validate class="form-horizontal  form-label-left">
                        <?php echo csrf_field(); ?>
                        <div class="item form-group">
                                <label class="col-form-label 
                                        col-md-3 col-sm-3 label-align" 
                                            for="datenew">
                                            من تاريخ  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" 
                                        name="datenew" 
                                            required class="form-control"
                                                value="<?php echo e(Carbon\Carbon::now()->format('Y-m-d')); ?>"
                                            >
                                    <?php if($errors->has('datenew')): ?>
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong><?php echo e($errors->first('datenew')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                        </div>
                        <div class="item form-group">
                                <label class="col-form-label 
                                        col-md-3 col-sm-3 label-align" 
                                            for="endtime">
                                                الى تاريخ  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" 
                                        name="endtime" 
                                            required class="form-control"
                                                value="<?php echo e(Carbon\Carbon::now()->format('Y-m-d')); ?>"
                                            >
                                    <?php if($errors->has('endtime')): ?>
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong><?php echo e($errors->first('endtime')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                        </div>
                         <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" 
                                        for="last-name">
                                             الفرع  
                                </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="branch" id="heard" class="form-control">
                                    <option value="">Choose One Branch..</option>
                                    <?php if(isset($branch)): ?>
                                        <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($bra->branch_id); ?>"> 
                                                <?php echo e($bra->branch_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($bra->branch_id); ?>"> 
                                                <?php echo e($bra->branch_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?> 
                                </select>
                                <?php if($errors->has('branch')): ?>
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong><?php echo e($errors->first('branch')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                         <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" 
                                        for="last-name">
                                             المستخدم  
                                </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="users" id="heard" class="form-control">
                                    <option value="">Choose One User..</option>
                                    <?php if(isset($users)): ?>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->Guid); ?>"> 
                                                <?php echo e($user->Name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->Guid); ?>"> 
                                                <?php echo e($user->Name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?> 
                                </select>
                                <?php if($errors->has('users')): ?>
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong><?php echo e($errors->first('users')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>

                <?php if(isset($materials)): ?>  
                <div class="row">
                <div class="table-responsive">
                    <table id="example" class="table table-striped jambo_table bulk_action display"  style="width:100%">
                        <thead>
                              <tr class="headings">
                                    <th>الرمز</th>                                        
                                    <th>المادة</th>                                      
                                    <th>الكمية</th>
                                    <th>السعر</th>
                                    <th>المجموع</th>
                              </tr>
                        </thead>
                        <tbody>
                       
                            <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                <td><?php echo e($material->Code); ?></td>
                                <td><?php echo e($material->Name1); ?></td>
                                <td><?php echo e(number_format($material->Qty,2)); ?></td>
                                <td><?php echo e(number_format($material->Price,2)); ?></td>
                                <td><?php echo e(number_format($material->Qty * $material->Price,2)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="lead muted text-right m-4">المجموع: <?php echo e(number_format($materials->sum('Qty') *  $materials->sum('Price'),2)); ?></div>
                <?php endif; ?>
                </div>                        
              </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            'excel',
            'pdf',
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>  

<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rest3\resources\views/POS/RepoMatSal.blade.php ENDPATH**/ ?>