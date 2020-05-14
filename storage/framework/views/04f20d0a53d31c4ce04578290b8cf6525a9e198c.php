<!--
    =========================================================
    Material Dashboard PRO - v2.1.0
    =========================================================

    Product Page: https://www.creative-tim.com/product/material-dashboard-pro
    Copyright 2019 Creative Tim (https://www.creative-tim.com)

    Coded by Creative Tim

    =========================================================

    The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo asset('theme/img/apple-icon.png'); ?>">
    <link rel="icon" type="image/png" href="<?php echo asset('theme/img/favicon.png'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Aurages Restaurant Administration System
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?php echo asset('theme/css/material-dashboard.css?v=2.1.0'); ?>" rel="stylesheet" />
    
    
    
    
    
    
<link href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.jqueryui.min.css" rel="stylesheet" />
    
    
    
    
    
    
    
    
    <?php echo $__env->yieldContent('head'); ?>
</head>

<body class="">
    <div class="wrapper ">

        <?php echo $__env->make('theme.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="main-panel">
            <?php echo $__env->make('theme.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>

            <?php echo $__env->make('theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="<?php echo asset('theme/js/core/jquery.min.js'); ?>"></script>
    <script src="<?php echo asset('theme/js/core/popper.min.js'); ?>"></script>
    <script src="<?php echo asset('theme/js/core/bootstrap-material-design.min.js'); ?>"></script>
    <script src="<?php echo asset('theme/js/plugins/perfect-scrollbar.jquery.min.js'); ?>"></script>
    <!-- Plugin for the momentJs  -->
    <script src="<?php echo asset('theme/js/plugins/moment.min.js'); ?>"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="<?php echo asset('theme/js/plugins/sweetalert2.js'); ?>"></script>
    <!-- Forms Validations Plugin -->
    <script src="<?php echo asset('theme/js/plugins/jquery.validate.min.js'); ?>"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="<?php echo asset('theme/js/plugins/jquery.bootstrap-wizard.js'); ?>"></script>
    <!--    Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="<?php echo asset('theme/js/plugins/bootstrap-selectpicker.js'); ?>"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="<?php echo asset('theme/js/plugins/bootstrap-datetimepicker.min.js'); ?>"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="<?php echo asset('theme/js/plugins/jquery.dataTables.min.js'); ?>"></script>
    <!--    Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="<?php echo asset('theme/js/plugins/bootstrap-tagsinput.js'); ?>"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="<?php echo asset('theme/js/plugins/jasny-bootstrap.min.js'); ?>"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="<?php echo asset('theme/js/plugins/fullcalendar.min.js'); ?>"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="<?php echo asset('theme/js/plugins/jquery-jvectormap.js'); ?>"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?php echo asset('theme/js/plugins/nouislider.min.js'); ?>"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="<?php echo asset('theme/js/plugins/arrive.min.js'); ?>"></script>
    <!--  Google Maps Plugin    -->
    <script src=" https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"> </script> <!-- Chartist JS -->
        <script src="<?php echo asset('theme/js/plugins/chartist.min.js'); ?>">
    </script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo asset('theme/js/plugins/bootstrap-notify.js'); ?>"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo asset('theme/js/material-dashboard.js?v=2.1.0" type="text/javascript'); ?>"></script>
    
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.js"></script>  
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.jqueryui.min.js"></script>  
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>  
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>  
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.js"></script>  
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.js"></script>  
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>  
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.js"></script>  
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    
    
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->yieldContent('script'); ?>


</body>

</html><?php /**PATH C:\xampp\htdocs\report\resources\views\theme\default.blade.php ENDPATH**/ ?>