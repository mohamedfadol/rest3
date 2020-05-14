<?php $__env->startSection('heading'); ?>
Employees
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<style>
    .table thead tr th {
        font-size: 0.8rem;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <a class="btn btn-primary" href="<?php echo e(route('employees.create')); ?>"><i class="material-icons">add</i> Add New Employee</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">people</i>
                </div>
                <h4 class="card-title">employees</h4>
            </div>
        
            <div class="card-body ">
                <div class="material-datatables">
                    <table id="employees-table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Id</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Language</th>
                                <th>Role</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Id</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Language</th>
                                <th>Role</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Web</td>
                                <td>John Doe</td>
                                <td>John</td>
                                <td>71</td>
                                <td>1234567480</td>
                                <td>john@example.com</td>
                                <td>Arabic</td>
                                <td>Chachier</td>
                                <td class="text-right">
                                    <a href="#" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">edit</i></a>
                                    <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>App</td>
                                <td>Jane Doe</td>
                                <td>Jane123</td>
                                <td>103</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Chachier</td>
                                <td class="text-right">
                                    <a href="#" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">edit</i></a>
                                    <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Web</td>
                                <td>Sam Smith</td>
                                <td>sam2019</td>
                                <td>113</td>
                                <td>012685542</td>
                                <td>sam@example.com</td>
                                <td>English</td>
                                <td>Accountant</td>
                                <td class="text-right">
                                    <a href="#" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">edit</i></a>
                                    <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">delete</i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $('#employees-table').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
            searchPlaceholder: "Search records",
        }
      });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\report\resources\views\employees\index.blade.php ENDPATH**/ ?>