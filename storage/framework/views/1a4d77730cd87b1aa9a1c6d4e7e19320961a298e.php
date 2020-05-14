<div class="sidebar" data-color="purple" data-background-color="white" data-image="<?php echo asset('theme/img/sidebar-1.jpg'); ?>">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <img src="<?php echo asset('favicon.png'); ?>" style="width:30px">
        </a>
        <a href="#" class="simple-text logo-normal">
            Aurages
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="<?php echo asset('theme/img/faces/avatar.jpg'); ?>" />
            </div>
            <div class="user-info">
                <a href="#" class="username">
                    <span>
                        Tania Andrew
                    </span>
                </a>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item <?php echo e(request()->is('menus*') || request()->is('categories*') || request()->is('products*') || request()->is('ingredients*') || request()->is('modifires*') ? 'active' : ''); ?>">
                <a class="nav-link" data-toggle="collapse" href="#menu" aria-expanded="<?php echo e(request()->is('menus*') || request()->is('categories*') || request()->is('products*') || request()->is('ingredients*') || request()->is('modifires*') ? 'true' : 'false'); ?>">
                    <i class="material-icons">menu_book</i>
                    <p> Menu
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo e(request()->is('menus*') || request()->is('categories*') || request()->is('products*') || request()->is('ingredients*') || request()->is('modifires*') ? 'show' : ''); ?>" id="menu">
                    <ul class="nav">
                        <li class="nav-item <?php echo e(request()->is('menus*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('menu.home')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">list</i></span>
                                <span class="sidebar-normal"> Menu Display </span>
                            </a>
                        </li>

                        <li class="nav-item <?php echo e(request()->is('categories*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('category.home')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">category</i></span>
                                <span class="sidebar-normal"> Categories </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('products*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('product.home')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">restaurant_menu</i></span>
                                <span class="sidebar-normal"> Products </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('ingredients*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('ingredient.home')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">kitchen</i></span>
                                <span class="sidebar-normal"> Ingredients </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('modifires*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('modifire.home')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">power</i></span>
                                <span class="sidebar-normal"> Modifiers </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#reports">
                    <i class="material-icons">pie_chart</i>
                    <p> Reports
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="reports">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#sales">
                                <span class="sidebar-mini"><i class="material-icons">money</i></span>
                                <span class="sidebar-normal"> Sales <b class="caret"></b></span>
                            </a>
                            <div class="collapse" id="sales">
                                <ul class="nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"><i class="material-icons">av_timer</i></span>
                                            <span class="sidebar-normal"> Timely </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"><i class="material-icons">restaurant_menu</i></span>
                                            <span class="sidebar-normal"> Product </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"><i class="material-icons">store_mall_directory</i></span>
                                            <span class="sidebar-normal"> Branch </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"><i class="material-icons">person_outline</i></span>
                                            <span class="sidebar-normal"> Employee </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"><i class="material-icons">people_outline</i></span>
                                            <span class="sidebar-normal"> Customer </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"><i class="material-icons">local_atm</i></span>
                                            <span class="sidebar-normal"> Payment </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><i class="material-icons">attach_money</i></span>
                                <span class="sidebar-normal"> Revenue </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"> Advance </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(route('reports.dailyOrders')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"> Daily Orders </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(route('reports.productsSales')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"> Products Sales </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(route('reports.categoriesSales')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"> Categories Sales </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(route('reports.totalSales')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"> Total Sales </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(route('reports.ingredientsSales')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"> Ingredients Sales </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(route('reports.log')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">bar_chart</i></span>
                                <span class="sidebar-normal"> Activity Log </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo e(request()->is('discounts*') || request()->is('giftcards*') ? 'active' : ''); ?>">
                <a class="nav-link" data-toggle="collapse" href="#promotions" aria-expanded="<?php echo e(request()->is('discounts*') || request()->is('giftcards*') ? 'true' : 'false'); ?>">
                    <i class="material-icons">library_add</i>
                    <p> Promotions
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo e(request()->is('discounts*') || request()->is('giftcards*') ? 'show' : ''); ?>" id="promotions">
                    <ul class="nav">
                        <li class="nav-item <?php echo e(request()->is('discounts*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('discount.home')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">local_offer</i></span>
                                <span class="sidebar-normal"> Discount </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('giftcards*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('giftcard.home')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">card_giftcard</i></span>
                                <span class="sidebar-normal"> Gift Cards </span>
                            </a>
                        </li>
                        <li class="nav-item disabled">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><i class="material-icons">event</i></span>
                                <span class="sidebar-normal">Timed Events</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo e(request()->is('employees*') ? 'active' : ''); ?>">
                <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="<?php echo e(request()->is('employees*') ? 'true' : 'false'); ?>">
                    <i class="material-icons">person</i>
                    <p> Users
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo e(request()->is('employees*') ? 'show' : ''); ?>" id="users">
                    <ul class="nav">
                        <li class="nav-item <?php echo e(request()->is('employees*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('users.index')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">people_alt</i></span>
                                <span class="sidebar-normal"> Users </span>
                            </a>
                        </li>
                        <li class="nav-item disabled">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><i class="material-icons">supervised_user_circle</i></span>
                                <span class="sidebar-normal"> User Groups </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('employees*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('customer.home')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">people_alt</i></span>
                                <span class="sidebar-normal"> Customers </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo e(request()->is('branches*') || request()->is('floors*') ? 'active' : ''); ?>">
                <a class="nav-link" data-toggle="collapse" href="#branches" aria-expanded="<?php echo e(request()->is('branches*') || request()->is('floors*') ? 'true' : 'false'); ?>">
                    <i class="material-icons">restaurant</i>
                    <p> Branches & Floors
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo e(request()->is('branches*') || request()->is('floors*') ? 'show' : ''); ?>" id="branches">
                    <ul class="nav">
                        <li class="nav-item <?php echo e(request()->is('branches*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('branch.home')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">restaurant</i></span>
                                <span class="sidebar-normal"> Branches</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('floors*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('floor.home')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">local_cafe</i></span>
                                <span class="sidebar-normal"> Floors</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('tables*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('table.home')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">table_chart</i></span>
                                <span class="sidebar-normal"> Tables</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(request()->is('tables*') ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('payment.home')); ?>">
                                <span class="sidebar-mini"><i class="material-icons">local_atm</i></span>
                                <span class="sidebar-normal"> Payment</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#devices_and_printers">
                    <i class="material-icons">widgets</i>
                    <p> Devices & Printers
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="devices_and_printers">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><i class="material-icons">devices_other</i></span>
                                <span class="sidebar-normal"> Devices </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#printers">
                                <span class="sidebar-mini"><i class="material-icons">print</i></span>
                                <span class="sidebar-normal"> Printers <b class="caret"></b></span>
                            </a>
                            <div class="collapse" id="printers">
                                <ul class="nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="<?php echo e(route('printer.home')); ?>">
                                            <span class="sidebar-mini"><i class="material-icons">print</i></span>
                                            <span class="sidebar-normal"> Printers </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"><i class="material-icons">receipt</i></span>
                                            <span class="sidebar-normal"> Printers Template Receipt </span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"><i class="material-icons">local_atm</i></span>
                                            <span class="sidebar-normal"> Cash Drawer </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item disabled">
                <a class="nav-link" href="#">
                    <i class="material-icons">settings</i>
                    <p> Settings </p>
                </a>
            </li>
        </ul>
    </div>
</div><?php /**PATH C:\xampp\htdocs\report\resources\views\theme\sidebar.blade.php ENDPATH**/ ?>