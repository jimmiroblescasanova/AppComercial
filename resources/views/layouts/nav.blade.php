<nav class="navbar navbar-expand-md navbar-dark bg-dark">
   <a class="navbar-brand" href="#">Mercalub</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
          @if (Auth::guard('admin')->check())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Inicio</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="{{ route('admin.comisiones.parametros') }}">Comisiones</a>
                    <a class="dropdown-item" href="{{ route('admin.saldos.parametros') }}">Saldos vencidos</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="dropdown-users" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                <div class="dropdown-menu" aria-labelledby="dropdown-users">
                    <a href="{{ route('admin.users') }}" class="dropdown-item">Listado</a>
                </div>
            </li>
          @else
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Inicio <span class="sr-only">(current)</span></a>
            </li>
          @endif
      </ul>
      <form action="{{ Auth::guard('admin')->check() ? route('admin.logout') : route('logout') }}" method="POST" class="mx-2">
         @csrf
         <button class="btn btn-danger btn-block-xs-only">Salir</button>
      </form>
   </div>
</nav>
