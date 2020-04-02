<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('/logo.png') }}"
             alt="Mercalub Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Mercalub</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name : Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @if(Auth::guard('admin')->check())
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link  {{ setActive('admin.dashboard') }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{ showMenu('admin.orders.*') }}">
                        <a href="#" class="nav-link {{ setActive('admin.orders.*')  }}">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Pedidos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.orders.index') }}" class="nav-link {{ setActive('admin.orders.index') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users') }}" class="nav-link {{ setActive('admin.users') }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Clientes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.agents.index') }}" class="nav-link {{ setActive('admin.agents.index') }}">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>Agentes</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{ showMenu('admin.reportes.*') }}">
                        <a href="#" class="nav-link {{ setActive('admin.reportes.*') }}">
                            <i class="nav-icon fas fa-funnel-dollar"></i>
                            <p>Reportes
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.reportes.comisiones.parametros') }}" class="nav-link {{ setActive('admin.reportes.comisiones.*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Comisiones</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.reportes.saldos.parametros') }}" class="nav-link {{ setActive('admin.reportes.saldos.*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Saldos vencidos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('clients.home') }}" class="nav-link {{ setActive('clients.home') }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{ showMenu('clients.order.*') }}">
                        <a href="#" class="nav-link {{ setActive('clients.order.*') }}">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Pedidos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('clients.order.create') }}" class="nav-link {{ setActive('clients.order.create') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Crear pedido</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('clients.order.index') }}" class="nav-link {{ setActive('clients.order.index') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mis pedidos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="#" id="logoutButton" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p>Cerrar sesión</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
