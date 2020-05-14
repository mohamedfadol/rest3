<?php $__env->startSection('head'); ?>
<style>
    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
    top: 10px;
    left: -18px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
Activity Log Report
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">list</i>
                </div>
                <h4 class="card-title">Activity Log Report</h4>
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
                <form method="POST" action="<?php echo e(route('reports.log')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label" for="from">From</label>
                            <input type="date" class="form-control mt-2" id="from" name="from" value="<?php echo e($request ? $request->from : Carbon\Carbon::now()->subMonth()->format('Y-m-d')); ?>" required>
                        </div>

                        <div class="form-group col-md-6 mt-4">
                            <label class="bmd-label" for="to">To</label>
                            <input type="date" class="form-control mt-2" id="to" name="to" value="<?php echo e($request ? $request->to : Carbon\Carbon::now()->format('Y-m-d')); ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 mt-6 row">
                            <label class="bmd-label-floating" for="user">User</label>
                            <select id="user" class="custom-select" name="user">
                                <option value="all" <?php echo e($request ? ($request->user == 'all' ? 'selected' : '') : ''); ?>>All</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>" <?php echo e($request ? ($request->user == $user->id ? 'selected' : '') : ''); ?>><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                </form>
            </div>
        </div>

        <?php if($request): ?>
            <div id="results" class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Results</h4>
                </div>
                <div class="card-body ">
                    <table id="activities-table" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Description</th>
                                <th>Subject Type</th>
                                <th>Date</th>
                                <th>Properties</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            var params = {
                _token: $('input[name=_token]').val(),
                from: $('input[name=from]').val(),
                to: $('input[name=to]').val(),
                user: $('#user').val()
            };
            
            $('#activities-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(route('reports.drawLogTable')); ?>",
                    type: "POST",
                    data: params
                },
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    { data: 'subject_type', name: 'subject_type' },
                    { data: 'date', name: 'date' },
                    { data: 'properties', name: 'properties' },
                ],
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                searchPlaceholder: "Search",
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\reports\log.blade.php ENDPATH**/ ?>