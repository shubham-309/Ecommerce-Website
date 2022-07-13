<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        E-Shop
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item  {{Request::is( 'dashboard' ) ? 'active' : '' }}">
                        <a class="nav-link" href="dashboard">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class= "{{Request::is( 'category' ) ? 'active' : '' }} ">
                        <a class="nav-link" href="{{url('category')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>category</p>
                        </a>
                    </li>
                    <li class= "{{Request::is( 'add-category' ) ? 'active' : '' }} ">
                        <a class="nav-link" href="{{url('add-category')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Add Category</p>
                        </a>
                    </li>
                    <li class= "{{Request::is( 'products' ) ? 'active' : '' }} ">
                        <a class="nav-link" href="{{url('products')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    <li class= "{{Request::is( 'add-product' ) ? 'active' : '' }} ">
                        <a class="nav-link" href="{{url('add-product')}}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Add Products</p>
                        </a>
                    </li>
                    <li class= "{{Request::is( 'Orders' ) ? 'active' : '' }} ">
                        <a class="nav-link" href="{{url('Orders')}}">
                            <i class="nc-icon nc-notes"></i>
                            <p>Orders</p>
                        </a>
                    </li>


                    <li class= "{{Request::is( 'Users' ) ? 'active' : '' }} ">
                        <a class="nav-link" href="{{url('Users')}}">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Users</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
