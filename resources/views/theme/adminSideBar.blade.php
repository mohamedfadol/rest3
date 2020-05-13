<div class="sidebar" data-color="purple" data-background-color="white" data-image="{!! asset('theme/img/sidebar-1.jpg') !!}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <img src="{!! asset('favicon.png') !!}" style="width:30px">
        </a>
        <a href="#" class="simple-text logo-normal">
            Aurages
        </a> 
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{!! asset('theme/img/faces/avatar.jpg') !!}" />
            </div>
            <div class="user-info">
                <a href="#" class="username">
                    <span>
                        {{ Auth::user()->name}}
                    </span>
                </a>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item {{ request()->is('menus*') || request()->is('categories*') || request()->is('products*') || request()->is('ingredients*') || request()->is('modifires*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#menu" aria-expanded="{{ request()->is('menus*') || request()->is('categories*') || request()->is('products*') || request()->is('ingredients*') || request()->is('modifires*') ? 'true' : 'false' }}">
                    <i class="material-icons">menu_book</i>
                    <p> Aurages Dashboard 
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ request()->is('menus*') || request()->is('categories*') || request()->is('products*') || request()->is('ingredients*') || request()->is('modifires*') ? 'show' : '' }}" id="menu">
                    <ul class="nav">
                        <li class="nav-item {{ request()->is('menus*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.control') }}">
                                <span class="sidebar-mini"><i class="material-icons">list</i></span>
                                <span class="sidebar-normal"> Branches management </span>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('categories*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <span class="sidebar-mini"><i class="material-icons">category</i></span>
                                <span class="sidebar-normal"> Categories </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('products*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <span class="sidebar-mini"><i class="material-icons">restaurant_menu</i></span>
                                <span class="sidebar-normal"> Products </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('ingredients*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <span class="sidebar-mini"><i class="material-icons">kitchen</i></span>
                                <span class="sidebar-normal"> Ingredients </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('modifires*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <span class="sidebar-mini"><i class="material-icons">power</i></span>
                                <span class="sidebar-normal"> Modifiers </span>
                            </a>
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
</div>