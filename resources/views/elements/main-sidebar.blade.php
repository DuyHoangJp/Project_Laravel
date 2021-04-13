<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            @include('elements.user-panel')
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">LAOYOUT ADMIN</li>

                <li>
                    <a href="{{ route('category') }}">
                        <i class="fa fa-th"></i> <span>Category</span>
                    </a>

                </li>
                <li>
                    <a href="{{ route('slider') }}">
                        <i class="fa fa-th"></i> <span>Slider</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('articles') }}">
                        <i class="fa fa-th"></i> <span>Articles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users') }}">
                        <i class="fa fa-code"></i> <span>Quản lý user</span>
                        <span class="pull-right-container">
            </span>
                    </a>
                </li>
                <li>
                    <a href="index.php?area=Backend&controller=Logout">
                        <i class="fa fa-code"></i> <span>Logout</span>
                        <span class="pull-right-container">
            </span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>